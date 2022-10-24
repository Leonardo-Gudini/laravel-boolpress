@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Qui puoi modificare le tue Categorie</h1>

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
        @foreach ($categories as $category)
        <tbody>
            <tr>
              <td>{{ $category->id }}</td>
              <td>{{ $category->name }}</td>
              <td>{{ $category->slug }}</td>
              {{-- <td>{{ $tag->name }}</td>
              <td>{{ $tag->slug }}</td>
              <td>
                <a class="btn btn-primary" href="{{ route('admin.tags.show', compact('tag'))}}">Details</a>
              </td> --}}
            </tr>
          </tbody>
        @endforeach
      </table>
</div>
@endsection