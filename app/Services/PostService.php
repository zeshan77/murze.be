<?php

namespace App\Services;


use App\Models\Post;

class PostService
{
    /**
     * @var Post
     */
    private $model;

    /**
     * PostService constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    /**
     * @param int $noOfPosts
     * @return mixed
     */
    public function recentPosts($noOfPosts = 50)
    {
        return $this->model
            ->latest()
            ->take($noOfPosts)
            ->get();
    }

}