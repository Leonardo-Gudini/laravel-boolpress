@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Qui puoi modificare i tuoi Tag</h1>

    {{-- <a class="btn btn-primary" href="{{ route('admin.posts.create') }}">Crea nuovo tag</a> --}}

    <table class="mt-3 table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Slug</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        @foreach ($tags as $tag)
        <tbody>
            <tr>
              <td>{{ $tag->id }}</td>
              <td>{{ $tag->name }}</td>
              <td>{{ $tag->slug }}</td>
              <td>
                <a class="btn btn-primary" href="{{ route('admin.tags.show', compact('tag'))}}">Details</a>
                {{-- <a class="btn btn-warning" href="{{ route('admin.posts.edit', compact('post'))}}">Edit</a> --}}
                {{-- <form method="POST" action="{{route('admin.posts.destroy', ['post' => $post->id])}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-1">Delete</button>
                </form> --}}
              </td>
            </tr>
          </tbody>
        @endforeach
      </table>
</div>
@endsection