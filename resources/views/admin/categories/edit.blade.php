@extends('layouts.admin')

@section('title', 'Create category')

@section('content')
    <section class="container m-auto">
        <div class="d-flex align-items-center mt-3">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-primary "><i><i class="fa-solid fa-arrow-left"></i></a>
            <h1 class="mx-3">Edit</h1>
        </div>
        <form action="{{ route('admin.categories.update', $category) }}" method="category">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="category_id" class="form-label">Select Category</label>
                <input type="text" name="category_id" value="{{$category->name}}" id="category_id" class="form-control 
                    @error('category_id') is-invalid @enderror">
                </input>
                @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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