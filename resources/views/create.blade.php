@extends('layout')

@section('title', 'Assignment 3 | Add Track')

@section('main')

  <h1>Add Track</h1><br/>

  <!-- NAV -->
  <ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link" href="/tracks">Tracks</a>
      </li>
    
    <li class="nav-item">
        <a class="nav-link" href="/genres">Genres</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="/tracks/new">Add Track</a>
    </li>    
  </ul><br/><hr/>

  <div class="row">
    <div class="col">
      <form action="/tracks" method="POST">
        @csrf

        <!-- a text input for name -->
        <div class="form-group">
          <label for="name">Track Name</label>
          <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
          <small class="text-danger">{{$errors->first('name')}}</small>
        </div>

        <!-- a select menu populated with all available albums -->
        <div class="form-group">
          <label for="albums">Album</label>
          <select class="form-control" id="albums" name="albums" class="form-control">
            @foreach($albums as $album)
            <option value="{{$album->AlbumId}}" {{$album->AlbumId == old('albums') ? "selected" : ""}} >
              {{$album->Title}}
            </option>
            @endforeach
          </select>
          <small class="text-danger">{{$errors->first('albums')}}</small>
        </div>

        <!-- a select menu populated with all available media types -->
        <div class="form-group">
          <label for="mediatype">Media Type</label>
          <select class="form-control" id="mediatype" name="mediatype" class="form-control">
            @foreach($mediatypes as $media)
            <option value="{{$media->MediaTypeId}}" {{$media->MediaTypeId == old('mediatype') ? "selected" : ""}} >
              {{$media->Name}}
            </option>
            @endforeach
          </select>
          <small class="text-danger">{{$errors->first('mediatype')}}</small>
        </div>

        <!-- a select menu populated with all available genres -->
        <div class="form-group">
          <label for="genres">Genre</label>
          <select class="form-control" id="genres" name="genres" class="form-control">
            @foreach($genres as $genre)
            <option value="{{$genre->GenreId}}" {{$genre->GenreId == old('genres') ? "selected" : ""}} >
              {{$genre->Name}}
            </option>
            @endforeach
          </select>
          <small class="text-danger">{{$errors->first('genres')}}</small>
        </div>

        <!-- a text input for composer -->
        <div class="form-group">
          <label for="composer">Composer</label>
          <input type="text" id="composer" name="composer" class="form-control" value="{{old('composer')}}">
          <small class="text-danger">{{$errors->first('composer')}}</small>
        </div>

        <!-- a number input for milliseconds -->
        <div class="form-group">
          <label for="duration">Duration (milliseconds)</label>
          <input type="text" id="duration" name="duration" class="form-control" value="{{old('duration')}}">
          <small class="text-danger">{{$errors->first('duration')}}</small>
        </div>

        <!-- a number input for bytes -->
        <div class="form-group">
          <label for="size">Size (bytes)</label>
          <input type="text" id="size" name="size" class="form-control" value="{{old('size')}}">
          <small class="text-danger">{{$errors->first('size')}}</small>
        </div>

        <!-- a number input for the unit price -->
        <div class="form-group">
          <label for="price">Unit Price (exclude the $ symbol)</label>
          <input type="text" id="price" name="price" class="form-control" value="{{old('price')}}">
          <small class="text-danger">{{$errors->first('price')}}</small>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Save Track</button>
        </div>

      </form>
    </div>
  </div>
@endsection