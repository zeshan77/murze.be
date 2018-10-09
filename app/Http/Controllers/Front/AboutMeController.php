<?php

namespace App\Http\Controllers\Front;

use App\Page;
use App\Http\Controllers\Controller;

class AboutMeController extends Controller
{
    public function index()
    {
        $page = Page::page('about-me')->first();
        return view('front.pages.detail', compact('page'));
    }

}
