<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrendingRequest;
use App\Http\Services\TrendingRepositoriesService;

class TrendingController extends Controller
{

    private $trendingRepositoriesService;

    public function __construct(TrendingRepositoriesService $trendingRepositoriesService)
    {
        $this->trendingRepositoriesService = $trendingRepositoriesService;
    }

    public function __invoke(TrendingRequest $request)
    {
        return $this->trendingRepositoriesService->search($request->validated());
    }

}
