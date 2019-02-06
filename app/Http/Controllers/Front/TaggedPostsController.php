<?php

namespace App\Http\Controllers\Front;
use App\Models\Post;
use Illuminate\Routing\Controller;
use Spatie\Tags\Tag;

class TaggedPostsController extends Controller
{
    public function index($tag)
    {
        $tag = Tag::whereSlug($tag)->first();
        $posts = Post::orderBy('created_at', 'desc')
            ->withAllTags([$tag])
            ->simplePaginate(50);

        return view('front.taggedPosts.index', compact('tag', 'posts'));
    }
}
