<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class TracksController extends Controller
{

    public function index(Request $request) {

    	$query = DB::table('tracks')
    		->select('tracks.Name AS trackName', 'albums.Title AS albumTitle', 'artists.Name AS artistName', 'tracks.UnitPrice AS price', 'genres.Name AS genre')
    		->join('genres', 'tracks.GenreId', '=', 'genres.GenreId')
    		->join('albums', 'tracks.AlbumId', '=', 'albums.AlbumId')
    		->join('artists', 'artists.ArtistId', '=', 'albums.ArtistId');

    	if ($request->query('genre')) {
    		$query->where('genres.Name', '=', $request->query('genre'));
    	}

    	$tracks = $query->get();

    	return view('tracks', [
    		'tracks' => $tracks,
    		'search' => $request->query('search')
    	]);
    }

    public function create() {
        
        $albums = DB::table('albums')->get();
        $mediatypes = DB::table('media_types')->get();
        $genres = DB::table('genres')->get();

        return view('create', [
            'albums' => $albums,
            'mediatypes' => $mediatypes,
            'genres' => $genres
        ]);
    }

    public function store(Request $request) {

        $input = $request->all();

        // Validate input based on these rules:
        // - All fields required
        // - Ms, bytes, and unit prices are numbers
        $validation = Validator::make($input, [
            'name' => 'required',
            'albums' => 'required',
            'mediatype' => 'required',
            'genres' => 'required',
            'duration' => 'required|numeric',
            'composer' => 'required',
            'size' => 'required|numeric',
            'price' => 'required|numeric'
        ]);

        // If validation fails, redirect back to form with previous input and errors
        if ($validation->fails()) {
            return redirect('/tracks/new')
                ->withInput()
                ->withErrors($validation);
        } 

        // Otherwise, insert the playlist into the database
        DB::table('tracks')->insert([
            'Name' => $request->name,
            'AlbumId' => $request->albums,
            'MediaTypeId' => $request->mediatype,
            'GenreId' => $request->genres,
            'Milliseconds' => $request->duration,
            'Composer' => $request->composer,
            'Bytes' => $request->size,
            'UnitPrice' => $request->price
        ]);
        
        // Redirect back to /tracks
         return redirect('/tracks');
    }
}
