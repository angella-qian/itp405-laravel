@extends('layout')

<!-- Don't need closing tag with 2nd argument -->
@section('title', 'Assignment 3 | Genres')

@section('main')

  <h1>Genres</h1><br/>

  <!-- NAV -->
  <ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link active" href="/tracks">Tracks</a>
      </li>
    
    <li class="nav-item">
        <a class="nav-link" href="/genres">Genres</a>
    </li><hr/>

  <form action="/genres/" method="GET">
    <strong>Search for a genre</strong><br/>
    <input type="text"
         name="search"
         value="{{$search}}">
    <button class="btn btn-primary" type="submit">Search</button>
    <a href="/genres/" class="btn btn-light">Clear</a>
  </form><br/>
  <table class="table">
    <tr>
      <th>Genre</th>
      <th>Associated Tracks</a>
      <th>Update Genre</th>
    </tr>

    @forelse($genres as $genre)
      <tr>
        <td>
          {{$genre->Name}}
        </td>
        <td>
          <a href="/tracks?genre={{$genre->Name}}">View Tracks</a>
        </td>
        <td>
          <a href="/genres/{{$genre->GenreId}}/edit">Edit</a>
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="2">No genres were found.</td>
      </tr>
    @endforelse
  </table>

@endsection

  