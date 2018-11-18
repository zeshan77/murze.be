<?php
Route::feeds();
Route::get('/', 'HomeController@index');
Route::get('/projects', 'ProjectController@index');
Route::get('/about-me', 'AboutMeController@index');
Route::get('/contact-me', 'ContactMeController@index');
