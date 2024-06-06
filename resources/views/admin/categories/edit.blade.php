@extends('layouts.admin')

@section('title', 'Edit category'. $category->name)

@section('content')
    <section class="container m-auto">
        <div class="d-flex align-items-center mt-3">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-primary "><i><i class="fa-solid fa-arrow-left"></i></a>
            <h1 class="mx-3">Edit Category {{$category->name}}</h1>
        </div>
        <form action="{{ route('admin.categories.update', $category->slug) }}" method="POST">
            @csrf
            @method('PUT')


            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $category->name) }}" minlength="3" maxlength="200" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div id="nameHelp" class="form-text text-white">Inserire minimo 3 caratteri e massimo 200</div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Modifica</button>
                <button type="reset" class="btn btn-danger mx-4">
                    <a href="{{route('admin.categories.index')}}" class="text-white">Annulla</a>
                </button>
            </div>
        </form>


    </section>

@endsection