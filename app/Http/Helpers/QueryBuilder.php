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
        if (array_key_exists('created', $request)) {
            $query .= 'created:>' . $request['created'];
            $add = true;
            unset($request['created']);
        }

        if (array_key_exists('language', $request)) {
            if ($add) {
                $query .= "+";
            }
            $query .= 'language:' . $request['language'];
            unset($request['language']);
        }

        if (!array_key_exists('sort', $request)) {
            $request['sort'] = SortOptions::STARS();
        }

        foreach ($request as $key => $value) {
            $query .= '&' . $key . '=' . $value;
        }

        return $query_base.$query;
    }

}
