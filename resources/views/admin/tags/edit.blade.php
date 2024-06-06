@extends('layouts.admin')

@section('title', 'Create tag')

@section('content')
    <section class="container m-auto">
        <div class="d-flex align-items-center mt-3">
            <a href="{{ route('admin.tags.index') }}" class="btn btn-primary "><i><i class="fa-solid fa-arrow-left"></i></a>
            <h1 class="mx-3">Edit</h1>
        </div>
        <form action="{{ route('admin.tags.update', $tag) }}" method="tag">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="tag_id" class="form-label">Select tag</label>
                <select name="tag_id" id="tag_id" class="form-control @error('tag_id') is-invalid @enderror">
                     <option value="{{$tag->id}}">{{$tag->name}}</option>
                </select>
                @error('tag_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Modifica</button>
                <button type="reset" class="btn btn-danger mx-4">
                    <a href="{{route('admin.tags.index')}}" class="text-white">Annulla</a>
                </button>
            </div>
        </form>


    </section>

@endsection