<?php


namespace App\Http\Services;


use App\Http\Helpers\QueryBuilder;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;


class TrendingRepositoriesService
{

    public function search($request)
    {

        try {
            $url = $this->getGithubURL() . QueryBuilder::buildQuery($request);
            $client = new Client();
            $req = new Request('get', $url);

            return $client->send($req)->getBody();
        } catch (GuzzleException $e) {
            return response('{error:"there was an error please try again later"}', 400);
        }
    }


    protected function getGithubURL()
    {
        return env('GITHUB_URL', 'https://api.github.com');
    }
}
