<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class GenresController extends Controller
{
    public function index(Request $request) {

    	// Database driven stuff
    	$query = DB::table('genres');

    	if ($request->query('search')) {
    		$query->where('Name', '=', $request->query('search'));
    	}

    	$genres = $query->get();

    	return view('genres', [
    		'genres' => $genres,
    		'search' => $request->query('search')
    	]);
    }

    public function edit($id = null) {
        
        $genres = DB::table('genres')->get();

        if($id) {
            $genresList = DB::table('genres')
                ->where('GenreId', '=', $id)
                ->first();
        } else {
            $genresList = [];
        }

        return view('edit', [
            'genres' => $genresList
        ]);
    }

    public function store(Request $request) {

        $input = $request->all();

        // Validate input based on these rules:
        // - The genre name is required
        // - The genre name is at least 3 characters long
        // - The genre name doesn’t already exist in the genres 
        //   table. (See the unique rule)
        $validation = Validator::make($input, [
            'genre' => 'required|min:3|unique:genres,Name'
        ]);

        // If validation fails,redirect back to form with previous input and errors
        if ($validation->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validation);
        }

        // Otherwise, update the genre name in the database
        DB::table('genres')
            ->where('GenreId', $request->genreID)
            ->update(['Name' => $request->genre]);

        // Redirect back to /genres
        return redirect('/genres');
    }
}
