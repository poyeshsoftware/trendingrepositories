<?php


namespace App\Http\Helpers;


class GithubURL
{
    static function get()
    {
        return env('GITHUB_URL', 'https://api.github.com');
    }
}
