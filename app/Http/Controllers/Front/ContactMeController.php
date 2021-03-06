<?php

namespace App\Http\Controllers\Front;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactMeController extends Controller
{
    public function index()
    {
        $page = Page::page('contact-me')->first();
        return view('front.pages.detail', compact('page'));
    }
}
