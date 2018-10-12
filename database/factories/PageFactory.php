<?php

use App\Page;
use Faker\Generator as Faker;
$factory->define(Page::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'slug' => str_slug($title),
        'title' => $title,
        'content' => $faker->paragraph(4),
        'published_at' => date('Y-m-d H:i:s')
    ];
});