<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Image extends Model implements HasMedia
{
    use HasMediaTrait;

    public static function boot()
    {
        static::created(function (Image $image) {
            $image
                ->addMedia(public_path($image->path))
                ->withResponsiveImages()
                ->preservingOriginal()
                ->toMediaCollection();
        });
    }

    public static function findByPath(string $path): ?Image
    {
        return static::where('path', static::normalizePath($path))->first();
    }

    public static function createWithPath(string $path): Image
    {
        return static::create([
            'path' => static::normalizePath($path),
        ]);
    }

    protected static function normalizePath(string $path): string
    {
        return public_path("uploads/media/{$path}");
    }
}
