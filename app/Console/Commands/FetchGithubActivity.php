<?php

namespace App\Console\Commands;

use App\Models\GithubEvent;
use App\Services\Webhooks\Github\FetchGithubService;
use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class FetchGithubActivity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:github';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch github activities';

    /**
     * @var FetchGithubService
     */
    private $fetchGithubService;

    private $githubBaseURL = 'https://github.com/';

    /**
     * FetchGithubActivity constructor.
     * @param FetchGithubService $fetchGithubService
     */
    public function __construct(FetchGithubService $fetchGithubService)
    {
        parent::__construct();
        $this->fetchGithubService = $fetchGithubService;
    }

    public function handle()
    {
        $activities = $this->fetchGithubService->activities()->getResponseBody();

        $bar = $this->output->createProgressBar($activities->count());
        $count = ['count' => 0, 'total_count' => 0];
        $activities->each(function($activity) use (&$count, $bar) {
            $bar->advance();
            $count['total_count']++;
            if(!$this->isUniqueEvent($activity->id))
                return;

            $githubEvent = new GithubEvent();

            $githubEvent->event_id = $activity->id;
            $githubEvent->event_type = $activity->type;
            $githubEvent->repo_name = $activity->repo->name;
            $githubEvent->repo_url = $this->githubBaseURL . $activity->repo->name;
            $githubEvent->actor_name = $activity->actor->display_login;
            $githubEvent->actor_url = $this->githubBaseURL . $activity->actor->login;
            $date = $createDate = new \DateTime($activity->created_at);
            $githubEvent->event_created_at = $date->format('Y-m-d H:i:s');

            try {
                $githubEvent->save();

                $count['count']++;
            } catch (QueryException $exception) {
                Log::error('FetchGithubActivity:: failed to store data in db.', [
                    'error' => $exception->getMessage(),
                    'trace' => $exception->getTraceAsString()
                ]);
            }

        });

        $bar->finish();
        $this->info($count['count'] . ' out of ' . $count['total_count'] . ' events are saved.');

    }

    /**
     * @param $eventId
     * @return bool
     */
    private function isUniqueEvent($eventId)
    {
        return ! GithubEvent::whereEventId($eventId)->count();
    }
}
