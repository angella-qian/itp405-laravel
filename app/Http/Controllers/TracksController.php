<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TracksController extends Controller
{

    public function index(Request $request) {

    	// Can be database driven stuff, hardcoding for now
    	// $semester = 'Spring 2019';
    	// $course = 'ITP 405';

    	// Database driven stuff
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
    		// 'uscSemester' => $semester,
    		// 'course' => $course
    		'tracks' => $tracks,
    		'search' => $request->query('search')
    	]);
    }
}
