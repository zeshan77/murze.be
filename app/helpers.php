<?php

use App\Models\Image;

function image(string $path): ?Media
{
    $image = Image::findByPath($path);

    if (! $image) {
        $image = Image::createWithPath($path);
    }

    return optional($image)->getFirstMedia();
}