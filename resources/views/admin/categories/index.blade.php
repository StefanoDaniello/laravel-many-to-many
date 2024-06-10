@extends('layouts.admin')
@section('title', 'categories')

@section('content')
<section>
    @if(session()->has('message'))
    <div class="alert alert-success mt-3">{{session()->get('message')}}</div>
    @endif
    <div class="d-flex justify-content-between align-items-center py-4">
        <h1>Categories</h1>
        <a href="{{route('admin.categories.create')}}" class="button-create btn fw-bold text-white"><i class="fa-solid fa-plus"></i> ADD</a>
    </div>

    <table class="tb-glass">
        <thead>
            <tr>
              <th scope="col" class="d-none d-lg-table-cell">Id</th>
              <th scope="col">Name</th>
              <th scope="col" class="d-none d-xl-table-cell">Slug</th>
              <th scope="col">Created At</th>
              <th scope="col">Update At</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
            <tr>
                <td class="d-none d-lg-table-cell">{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td class="d-none d-xl-table-cell">{{$category->slug}}</td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td>
                <td>
                    <a href="{{route('admin.categories.show', $category->slug)}}"  title="Visualizza"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{route('admin.categories.edit', $category->slug)}}" title="Modifica"><i class="fa-solid fa-pen"></i></a>
                    <form action="{{route('admin.categories.destroy', $category->slug)}}" method="POST" class="d-inline-block">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="delete-button border-0 bg-transparent" title="Elimina"  data-item-title="{{ $category->name }}">
                        <i class="fa-solid fa-trash"></i>
                      </button>
                    </form>
                </td>
              </tr>
            @endforeach
          </tbody>
      </table>
</section>
{{ $categories->links('vendor.pagination.bootstrap-5')}} 
@include('partials.modal-delete')
@endsection