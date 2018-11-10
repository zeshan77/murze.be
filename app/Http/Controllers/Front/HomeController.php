<?php

namespace App\Http\Controllers\Front;

use App\Page;
use App\Services\GithubService;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    /**
     * @param GithubService $githubService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(GithubService $githubService)
    {
        $data = [
            'page' => Page::whereSlug('home')->first(),
            'githubEvents' => $githubService->recent(),
            'mapGithubEvents' => $githubService->mapEvents()
        ];
        return view('front.home.index', $data);
    }

}
