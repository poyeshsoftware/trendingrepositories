<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrendingRequest;
use App\Http\Services\TrendingRepositoriesInterface;


class TrendingController extends Controller
{

    private $trendingRepositoriesService;

    public function __construct(TrendingRepositoriesInterface $trendingRepositoriesService)
    {
        $this->trendingRepositoriesService = $trendingRepositoriesService;
    }


    public function __invoke(TrendingRequest $request)
    {
        return $this->trendingRepositoriesService->search($request->validated());
    }

}
