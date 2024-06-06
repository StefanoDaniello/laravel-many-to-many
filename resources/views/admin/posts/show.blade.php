@extends('layouts.admin')
@section('title', $post->title)

@section('content')

    
<div class="ms-5 mt-5">
    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary "><i><i class="fa-solid fa-arrow-left"></i></a>
</div>
<section class="container d-flex justify-content-center mt-5">

    
    <div class="card my-3 overflow-hidden" style="width: 500px">
        <img src="{{asset('storage/'.$post->image)}}" alt="{{$post->title}}"> <br>
        <div class="card-body">
            <h1>{{$post->title}}</h1>
            <p>{{$post->content}}</p>
            @if($post->category)
            <p> Catrgory: {{$post->category->name}}</p>
            @endif
            <button class="btn btn-primary">
                <a href="{{route('admin.posts.edit', $post->slug)}}" class="text-white">Modifica</a>
            </button>
        </div>
    </div>
    
   
</section>
@endsection

