<?php

namespace App\Console\Commands;

use App\Services\Twitter\TwitterService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use JsonSchema\Exception\InvalidSchemaException;

class FetchTwitterTimeline extends Command
{
    protected $signature = 'fetch:twitter';

    protected $description = 'fetch twitter timeline';

    private $url;
    /**
     * @var TwitterService
     */
    private $twitterService;


    /**
     * FetchTwitterTimeline constructor.
     * @param TwitterService $twitterService
     */
    public function __construct(TwitterService $twitterService)
    {
        parent::__construct();
        $this->url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
        $this->twitterService = $twitterService;
    }


    public function handle()
    {
        $timeline = $this->twitterService
            ->buildOauth($this->url, 'GET')
            ->performRequest();

        $this->validateJson($timeline);

        $timelineCollection = $this->transformRawTimeline(collect(json_decode($timeline)));

        $this->storeUserTimelineInFile($timelineCollection);

        logger('FetchTwitterTimeline:: saved user time line in json');

        $this->info('Twitter user timeline successfully fetched and processed.');
    }

    protected function storeUserTimelineInFile(Collection $userTimeline) : void
    {
        Storage::put('twitter/user_timeline.json', $userTimeline);
    }

    protected function transformRawTimeline(Collection $rawTweets) : Collection
    {
        return $rawTweets->map(function($tweet) {
            return  [
                'created_at' => Carbon::parse($tweet->created_at),
                'id' => $tweet->id,
                'text' => $tweet->text,
                'user' => [
                    'id' => $tweet->user->id,
                    'screen_name' => $tweet->user->screen_name,
                ],
                'hashtags' => collect($tweet->entities->hashtags)->pluck('text')->toArray(),
                'user_mentions' => collect($tweet->entities->user_mentions)->pluck('screen_name')->toArray()
            ];

        });
    }

    protected function validateJson($jsonObject)
    {
        if(json_decode($jsonObject, true) == NULL) {
            throw new InvalidSchemaException('Invalid json string');
        }

        return true;
    }
}
