<?php


namespace App\Http\Helpers;


use App\Enums\SortOptions;

class QueryBuilder
{

    static function buildQuery($request)
    {
        $query_base = '/search/repositories?q=';

        $query = "";

        $add = false;
        if (array_key_exists('query', $request)) {
            $query .= $request['query'];
            unset($request['query']);
            $add = true;
        }

        if (array_key_exists('language', $request)) {
            if ($add) {
                $query .= "+";
            }
            $query .= 'language:' . $request['language'];
            unset($request['language']);
        }

        if (array_key_exists('created', $request)) {
            $query .= "+";
            $query .= 'created:>' . $request['created'];
            unset($request['created']);
        }

        if (!array_key_exists('sort', $request)) {
            $request['sort'] = SortOptions::STARS();
        }

        foreach ($request as $key => $value) {
            $query .= '&' . $key . '=' . $value;
        }

        return $query_base . $query;
    }

}
