<?php
use Faker\Generator as Faker;
$factory->define(\App\Models\Project::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'slug' => str_slug($title),
        'title' => $title,
        'url' => $faker->url,
        'my_role' => $faker->sentence,
        'tools_used' => $faker->paragraph,
        'description' => $faker->paragraph(5),
        'published_at' => date('Y-m-d H:i:s')
    ];
});