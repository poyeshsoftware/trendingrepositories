<?php


namespace App\Http\Services;


use App\Http\Helpers\GithubURL;
use App\Http\Helpers\QueryBuilder;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;


class TrendingRepositoriesService implements TrendingRepositoriesInterface
{

    public function search($request)
    {

        try {
            $url = GithubURL::get() . QueryBuilder::buildQuery($request);
            $client = new Client();
            $req = new Request('get', $url);

            return $client->send($req)->getBody();
        } catch (GuzzleException $e) {
            $error = [
                'error' => true,
                'message' => 'please try again later'
            ];
            return response($error, 400);
        }
    }


}
