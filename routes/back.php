<?php

Route::redirect('/', '/admin/posts');

Route::resource('posts', 'PostsController');

Route::resource('pages', 'PageController');
Route::resource('projects', 'ProjectController');