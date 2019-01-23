@extends('layout')

<!-- Don't need closing tag with 2nd argument -->
@section('title', 'Assignment 2 | Tracks')

@section('main')
  <h1>Associated Tracks</h1><br/>
  <table class="table">
    <tr>
      <th>Track Name</th>
      <th>Album Title</th>
      <th>Artist Name</th>
      <th>Price</th>
      <th>Genre</th>
    </tr>
    @forelse($tracks as $track)
      <tr>
        <td>
          {{$track->trackName}}
        </td>
        <td>
          {{$track->albumTitle}}
        </td>
        <td>
          {{$track->artistName}}
        </td>
        <td>
          {{$track->price}}
        </td>
        <td>
          {{$track->genre}}
        </td>

      </tr>
    @empty
      <tr>
        <td colspan="4">No tracks were found.</td>
      </tr>
    @endforelse
  </table>
  
@endsection
