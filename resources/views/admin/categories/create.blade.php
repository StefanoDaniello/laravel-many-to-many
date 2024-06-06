@extends('layouts.admin')

@section('title', 'Create Post')

@section('content')
    <section class="container m-auto">
       <div class="d-flex align-items-center mt-3">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-primary "><i><i class="fa-solid fa-arrow-left"></i></a>
            <h1 class="mx-3">Create</h1>
        </div>
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label"> Category Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <button type="reset" class="btn btn-danger mx-4">
                    Reset
                </button>
            </div>
        </form>


    </section>

@endsection