<?php

namespace Tests\Feature;

use App\Http\Helpers\QueryBuilder;
use Tests\TestCase;

class QueryBuilderTest extends TestCase
{


    /**
     * @test
     */
    public function query_url_with_created()
    {
        $request = [
            'created' => '2012-12-30'
        ];

        $query = QueryBuilder::buildQuery($request);
        self::assertEquals("/search/repositories?q=created:>2012-12-30&sort=stars", $query);

    }

    /**
     * @test
     */
    public function query_url_with_laguage()
    {
        $request = [
            'language' => 'php'
        ];

        $query = QueryBuilder::buildQuery($request);
        self::assertEquals("/search/repositories?q=language:php&sort=stars", $query);

    }

    /**
     * @test
     */
    public function query_url_with_created_and_laguage()
    {
        $request = [
            'created' => '2012-12-30',
            'language' => 'php'
        ];

        $query = QueryBuilder::buildQuery($request);
        self::assertEquals("/search/repositories?q=created:>2012-12-30+language:php&sort=stars", $query);

    }

    /**
     * @test
     */
    public function query_url_with_laguage_and_order_by_asc()
    {
        $request = [
            'language' => 'php',
            'order' => 'asc',
        ];

        $query = QueryBuilder::buildQuery($request);
        self::assertEquals("/search/repositories?q=language:php&order=asc&sort=stars", $query);

    }

    /**
     * @test
     */
    public function query_url_with_laguage_and_order_by_desc()
    {
        $request = [
            'language' => 'php',
            'order' => 'desc',
        ];

        $query = QueryBuilder::buildQuery($request);
        self::assertEquals("/search/repositories?q=language:php&order=desc&sort=stars", $query);
    }

    /**
     * @test
     */
    public function query_url_with_laguage_and_per_page_10()
    {
        $request = [
            'language' => 'php',
            'per_page' => '10',
        ];

        $query = QueryBuilder::buildQuery($request);
        self::assertEquals("/search/repositories?q=language:php&per_page=10&sort=stars", $query);
    }

    /**
     * @test
     */
    public function query_url_with_laguage_and_per_page_50()
    {
        $request = [
            'language' => 'php',
            'per_page' => '50',
        ];

        $query = QueryBuilder::buildQuery($request);
        self::assertEquals("/search/repositories?q=language:php&per_page=50&sort=stars", $query);
    }

    /**
     * @test
     */
    public function query_url_with_laguage_and_sort_by_forks()
    {
        $request = [
            'language' => 'php',
            'sort' => 'forks',
        ];

        $query = QueryBuilder::buildQuery($request);
        self::assertEquals("/search/repositories?q=language:php&sort=forks", $query);
    }

    /**
     * @test
     */
    public function query_url_with_created_laguage_sort_order_perPage()
    {
        $request = [
            'created' => '2012-12-30',
            'language' => 'php',
            'per_page' => '10',
            'order' => 'desc',
            'sort' => 'forks',
        ];

        $query = QueryBuilder::buildQuery($request);
        self::assertEquals("/search/repositories?q=created:>2012-12-30+language:php&per_page=10&order=desc&sort=forks", $query);
    }

}
