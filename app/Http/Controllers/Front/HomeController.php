<?php

namespace App\Http\Controllers\Front;

use App\Models\Post;
use App\Models\Talk;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.me.index');
    }

}
