@extends('layouts.admin')
@section('title', 'Posts')

@section('content')
<section>
    @if(session()->has('message'))
    <div class="alert alert-success mt-3">{{session()->get('message')}}</div>
    @endif
    <div class="d-flex justify-content-between align-items-center py-4">
        <h1>Posts</h1>
        <a href="{{route('admin.posts.create')}}" class="button-create btn fw-bold text-white"><i class="fa-solid fa-plus"></i> ADD</a>
    </div>

    <table class="tb-glass" >
        <thead>
            <tr>
              <th scope="col" class="d-none d-lg-table-cell">Id</th>
              <th scope="col">Title</th>
              <th scope="col" class="d-none d-xl-table-cell">Slug</th>
              <th scope="col">Created At</th>
              <th scope="col">Update At</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
            <tr>
                <td class="d-none d-lg-table-cell ">{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td class="d-none d-xl-table-cell">{{$post->slug}}</td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->updated_at}}</td>
                <td>
                    <a href="{{route('admin.posts.show', $post->slug)}}"  title="Visualizza"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{route('admin.posts.edit', $post->slug)}}" title="Modifica"><i class="fa-solid fa-pen"></i></a>
                    <form action="{{route('admin.posts.destroy', $post->slug)}}" method="POST" 
                      class="d-inline-block" >
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="delete-button border-0 bg-transparent" 
                        title="Elimina"  data-item-title="{{ $post->title }}" >
                        <i class="fa-solid fa-trash"></i>
                      </button>
                    </form>
                </td>
              </tr>
            @endforeach
          </tbody>
      </table>
</section>
{{ $posts->links('vendor.pagination.bootstrap-5')}}
@include('partials.modal-delete')
@endsection