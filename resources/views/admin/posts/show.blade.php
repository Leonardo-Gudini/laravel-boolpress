@extends('layouts.app')

@section('content')



    <div class="container">

        <h1>Dettagli</h1>

        <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                  <th scope="row">{{ $posts->id }}</th>
                  <td>{{ $posts->title }}</td>
                  <td>{{ $posts->slug }}</td>
                  <td>{{ $posts->description }}</td>
                  <td>{{ $posts->category->name }}</td>
                </tr>
              </tbody>
          </table>
    </div>
@endsection
