<?php

namespace App\Services;

use App\Models\GithubEvent;
use Illuminate\Database\QueryException;

class GithubService
{
    /**
     * @var GithubEvent
     */
    private $githubEvent;

    /**
     * GithubService constructor.
     * @param GithubEvent $githubEvent
     */
    public function __construct(GithubEvent $githubEvent)
    {
        $this->githubEvent = $githubEvent;
    }

    public function recent($take = 5)
    {
        try {
            return $this->githubEvent
                ->recent()
                ->take($take)
                ->get();
        } catch (QueryException $exception) {
            logger('GithubService->recent()::', ['error' => $exception->getMessage()]);
            throw new \Exception('Unable to fetch github_events.');
        }
    }

    public function mapEvents()
    {
        return [
            'PushEvent' => 'pushed to ',
            'IssueCommentEvent' => 'commented on ',
            'IssuesEvent' => 'commented on ',
            'PullRequestEvent' => 'created pull request ',
            'ForkEvent' => 'forked ',
            'CreateEvent' => 'created a repo ',
            'DeleteEvent' => 'deleted a repo '
        ];
    }

}