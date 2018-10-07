<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactMeController extends Controller
{
    public function index()
    {
        return view('front.contact.index');
    }
}
