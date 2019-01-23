@extends('layout')

<!-- Don't need closing tag with 2nd argument -->
@section('title', 'Assignment 2 | Genres')

@section('main')

  <h1>Genres</h1>
  <form action="/genres/" method="GET">
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
    </tr>

    @forelse($genres as $genre)
      <tr>
        <td>
          {{$genre->Genre}}
        </td>
        <td>
          <a href="/tracks?genre={{$genre->Genre}}">View Tracks</a>
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="2">No genres were found.</td>
      </tr>
    @endforelse
  </table>

@endsection

  