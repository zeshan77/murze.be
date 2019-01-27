<?php

namespace App\Http\Controllers\Front;

use App\Page;
use App\Services\GithubService;
use App\Services\PostService;
use App\Services\Twitter\TwitterService;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    /**
     * @param GithubService $githubService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(GithubService $githubService, TwitterService $twitterService, PostService $postService)
    {
        $data = [
            'page' => Page::whereSlug('home')->first(),
            'githubEvents' => $githubService->recent(),
            'mapGithubEvents' => $githubService->mapEvents(),
            'twitterEvents' => $twitterService->getUserTimelineFromJson(),
            'posts' => $postService->recentPosts(5)
        ];

        return view('front.home.index', $data);
    }

}
