<?php


namespace App\Http\Helpers;


class QueryBuilder
{

    static function buildQuery($request)
    {
        $query = '/search/repositories?q=';

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

        foreach ($request as $key => $value) {
            $query .= '&' . $key . '=' . $value;
        }

        return $query;
    }


}
