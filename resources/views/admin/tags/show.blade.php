@extends('layouts.app')

@section('content')



    <div class="container">

        <h1>Dettagli</h1>

        <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                  <th scope="row">{{ $tags->id }}</th>
                  <td>{{ $tags->name }}</td>
                  <td>{{ $tags->slug }}</td>
                </tr>
              </tbody>
          </table>
    </div>
@endsection
