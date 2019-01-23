<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GenresController extends Controller
{
    public function index(Request $request) {

    	// Can be database driven stuff, hardcoding for now
    	// $semester = 'Spring 2019';
    	// $course = 'ITP 405';

    	// Database driven stuff
    	$query = DB::table('genres')
    		->select('genres.Name AS Genre');

    	if ($request->query('search')) {
    		$query->where('Name', '=', $request->query('search'));
    	}

    	$genres = $query->get();

    	return view('genres', [
    		// 'uscSemester' => $semester,
    		// 'course' => $course
    		'genres' => $genres,
    		'search' => $request->query('search')
    	]);
    }
}
