@extends('layouts.admin')

@section('title', 'Create Post')

@section('content')
    <section class="container m-auto">
        <div class="d-flex align-items-center mt-3">
            <a href="{{ route('admin.posts.index') }}" class="my-2">
                <button class="back-button">
                    <div class="back-button-box">
                      <span class="back-button-elem">
                        <svg viewBox="0 0 46 40" xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"
                          ></path>
                        </svg>
                      </span>
                      <span class="back-button-elem ">
                        <svg viewBox="0 0 46 40">
                          <path
                            d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"
                          ></path>
                        </svg>
                      </span>
                    </div>
                </button>
            </a>
            <h1 class="mx-2 mt-1">Create</h1>
        </div>
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title') }}"  maxlength="200">
                @error('title')
                    <div class ="alert alert-danger">{{$errors->first('title')}}</div>
                @enderror 
                <div id="titleHelp" class="form-text text-white">Inserire minimo 3 caratteri e massimo 200</div>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" accept="image/*" class="form-control 
                @error('image') is-invalid @enderror" id="upload_image"
                name="image" value="{{ old('image') }}" maxlength="255">
                @error('image')
                    <div class ="alert alert-danger">{{$errors->first('image')}}</div>
                @enderror 
                <h4 class="mt-3">Your image</h4>
                @if(old('image'))
                    <img src="{{asset('storage/' . old('image'))}}" alt="{{old('title')}}" id="uploadPreview" class="shadow rounded-4 m-4">
                @else 
                    <img src="https://img.freepik.com/free-vector/illustration-gallery-icon_53876-27002.jpg" alt="" id="uploadPreview" class="shadow rounded-4 m-4">
                @endif
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">
                {{ old('content') }}
              </textarea>
                @error('content')
                    <div class ="alert alert-danger">{{$errors->first('content')}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Select Category</label>
                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                    <option value="">Select Category</option>
                  @foreach ($categories as $category)
                      <option value="{{$category->id}}" {{ $category->id == old('category_id') ? 'selected' : '' }}>{{$category->name}}</option>
                  @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <p>Select  Tag:</p>
                @foreach ($tags as $tag)
                    <div>
                        <input class="form-check-input" type="checkbox" value="{{$tag->id}}"  name="tags[]"
                        {{-- per far si che i tag selezionati vengano salvati utilizzo 
                            un array dove veranno inseriti i valori di essi,
                            e tramite old verranno recuperati quando c'e un errore--}}
                        {{in_array($tag->id, old('tags', [])) ? 'checked' : ''}}>
                        <label class="form-check-label" for="">
                            {{$tag->name}}
                        </label>
                    </div>
                @endforeach
                @error('tags')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            
            <div class="my-3">
                <button type="submit" class="btn btn-primary text-white">Crea</button>
                <button type="reset"  class="btn btn-danger mx-4">Svuota campi</button>

            </div>
        </form>


    </section>
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
@endsection