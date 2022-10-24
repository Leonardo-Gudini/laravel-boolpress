@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Modifica il post</h1>

        <a class="btn btn-primary mb-3" href="{{ route('admin.posts.index') }}">Torna indietro</a>

        <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}" />
                  @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" rows="10">{{ old('description', $post->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                  {{-- <label for="tag">Tag</label>
                  @foreach ($tags as $tag)
                    <div class="mb-3 form-check">
                      <input {{ (in_array($tag->id, old('tags', [])))?'checked':'' }} value="{{ $tag->id }}" name="tags[]" type="checkbox" class="form-check-input" id="{{ $tag->id }}">
                      <label class="form-check-label" for="{{ $tag->id }}">{{ $tag->name }}</label>
                    </div>
                  @endforeach --}}

                  @foreach ($tags as $tag)
                    <div class="form-group form-check">
                        @if ($errors->any())
                            <input {{(in_array($tag->id, old('tags', [])))?'checked':''}} name="tags[]" type="checkbox" class="form-check-input" id="{{$tag->id}}" value="{{$tag->id}}">
                        @else
                            <input {{($post->tags->contains($tag))?'checked':''}} name="tags[]" type="checkbox" class="form-check-input" id="{{$tag->id}}"value="{{$tag->id}}">
                        @endif
                        <label class="form-check-label" for="{{$tag->id}}">{{$tag->name}}</label>
                    </div>
                @endforeach

                @error('tags')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                </div>

                <div class="form-group">
                  <select name="category_id" id="category_id" class="form-controll @error('title') is-invalid @enderror">
                    <option {{ (old('category_id', $post->category_id)==""?'selected':'') }} value="">Nessuna Categoria</option>
                    @foreach ($categories as $category)
                        <option {{(old('category_id', $post->category_id)==$category->id)?'selected':''}} value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                  @error('category_id')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                    
                  @enderror
                </div>

                <button class="btn btn-success" type="submit">Aggiorna</button>
        </form>


    </div>

@endsection
