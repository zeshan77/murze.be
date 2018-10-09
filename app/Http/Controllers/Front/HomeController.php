<?php

namespace App\Http\Controllers\Front;

use App\Models\Post;
use App\Models\Talk;
use App\Page;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $page = Page::whereSlug('home')->first();
        return view('front.home.index', compact('page'));
    }

}
