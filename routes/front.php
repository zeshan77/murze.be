<?php
Route::feeds();
Route::get('/', 'HomeController@index');
Route::get('/projects', 'ProjectController@index');
Route::get('/about-me', 'AboutMeController@index');
Route::get('/contact-me', 'ContactMeController@index');
Route::get('/posts', 'PostsController@index');
Route::get('/posts/{post}', 'PostsController@detail');
Route::get('/tag/{tag}', 'TaggedPostsController@index');
