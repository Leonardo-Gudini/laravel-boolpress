@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Crea un nuovo post</h1>
        <form action="{{ route('admin.posts.store') }}" method="post">
            @csrf
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}"/>
                  @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                  <label for="tag">Tag</label>
                  @foreach ($tags as $tag)
                    <div class="mb-3 form-check">
                      <input value="{{ $tag->id }}" name="tags[]" type="checkbox" class="form-check-input" id="{{ $tag->id }}">
                      <label class="form-check-label" for="{{ $tag->id }}">{{ $tag->name }}</label>
                    </div>
                  @endforeach
                </div>

                

                <div class="form-group">
                  <select name="category_id" id="category_id" class="form-controll @error('title') is-invalid @enderror">
                    <option value="">Nessuna Categoria</option>
                    @foreach ($categories as $category)
                        <option {{(old('category_id')==$category->id)?'selected':''}} value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                  @error('category_id')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                    
                  @enderror
                </div>

                <button class="btn btn-success" type="submit">Crea</button>
        </form>
    </div>

@endsection
