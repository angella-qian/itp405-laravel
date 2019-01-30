@extends('layout')

@section('title', 'Assignment 3 | Edit Genre')

@section('main')

  <h1>Edit Genre</h1><br/>

  <!-- NAV -->
  <ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link" href="/tracks">Tracks</a>
      </li>
    
    <li class="nav-item">
        <a class="nav-link" href="/genres">Genres</a>
    </li>  
  </ul><br/><hr/>

  <div class="row">
    <div class="col">
      <form action="/genres" method="POST">
        @csrf

          <!-- a text input for genre -->
          <div class="form-group">
            <label for="genre">Genre Name</label>
            <input type="text" id="genre" name="genre" class="form-control" value="{{ old('genre', $genres->Name) }}">
            <!-- old function can have a default parameter -->
            <small class="text-danger">{{$errors->first('genre')}}</small>

            <input type="hidden" id="genreID" name="genreID" value="{{$genres->GenreId}}">
          </div>

  

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Update Genre</button>
        </div>

      </form>
    </div>
  </div>
@endsection