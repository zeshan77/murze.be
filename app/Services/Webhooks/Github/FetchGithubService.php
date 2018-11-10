<?php

namespace App\Services\Webhooks\Github;

use GuzzleHttp\Client as HttpClient;

class FetchGithubService
{
    private $githubActivityUrl;
    /**
     * @var HttpClient
     */
    private $httpClient;

    private $httpResponse;

    /**
     * FetchGithubService constructor.
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->githubActivityUrl = 'https://api.github.com/users/zeshan77/events';
        $this->httpClient = $httpClient;
    }

    public function activities()
    {
        $this->httpResponse = $this->httpClient->request('get', $this->githubActivityUrl);

        return $this;
    }

    public function getResponseBody()
    {
        return collect(json_decode($this->httpResponse->getBody()));
    }

}