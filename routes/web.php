<?php

Route::get('/', 'TracksController@index');
Route::get('/tracks', 'TracksController@index');
Route::get('/tracks/new', 'TracksController@create');
Route::get('/genres', 'GenresController@index');
Route::get('/genres/{id}/edit', 'GenresController@edit');
Route::get('/docs', 'DocsController@index');

Route::post('/tracks', 'TracksController@store');
Route::post('/genres', 'GenresController@store');