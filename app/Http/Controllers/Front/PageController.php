<?php

namespace App\Http\Controllers\Front;

use App\Page;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function detail($slug)
    {
        if(!$page = Page::whereSlug($slug)->first()) {
            abort(404);
        }

        return view('front.pages.detail', compact('page'));
    }
}
