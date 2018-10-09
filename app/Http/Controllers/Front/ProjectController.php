<?php

namespace App\Http\Controllers\Front;

use App\Models\Project;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::get();
        return view('front.project.index', compact('projects'));
    }
}
