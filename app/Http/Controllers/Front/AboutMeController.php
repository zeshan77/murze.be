<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutMeController extends Controller
{
    public function index()
    {
        return view('front.about.index');
    }
}
