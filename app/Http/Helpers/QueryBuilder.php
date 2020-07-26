<?php


namespace App\Http\Helpers;


use App\Enums\SortOptions;

class QueryBuilder
{

    static function buildQuery($request)
    {
        $query_base = '/search/repositories?q=';

        $query = "";

        if (array_key_exists('created', $request)) {
            $query .= 'created:>' . $request['created'];
            unset($request['created']);
        } else {
            $query .= 'created:>2008-01-01';
        }


        if (array_key_exists('language', $request)) {
            $query .= "+";
            $query .= 'language:' . $request['language'];
            unset($request['language']);
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
