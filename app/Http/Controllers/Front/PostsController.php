<?php

namespace App\Http\Controllers\Front;

use App\Models\Ad;
use App\Models\Post;
use Illuminate\Routing\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('front.posts.index', compact('posts'));
    }
    public function detail(Post $post)
    {
        return view('front.posts.detail', compact('post', 'ad'));
    }
}
