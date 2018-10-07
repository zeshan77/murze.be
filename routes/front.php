<?php

Route::get('confirm-your-email', 'NewsletterController@confirm');
Route::get('subscribed', 'NewsletterController@subscribed');

Route::feeds();
Route::get('/', 'HomeController@index');
Route::get('/projects', 'ProjectController@index');
Route::get('/about-me', 'AboutMeController@index');
Route::get('/contact-me', 'ContactMeController@index');
Route::get('/blog', 'BlogController@index');
Route::get('tag/{tagSlug}', 'TaggedPostsController@index');

Route::get('payments', 'PaymentsController@index');
Route::post('payments/set-amount', 'PaymentsController@setAmount');
Route::post('payments', 'PaymentsController@handlePayment');

Route::get('{postSlug}', 'PostsController@detail');
