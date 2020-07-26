<?php

namespace Tests\Feature;

use App\Http\Services\TrendingRepositoriesInterface;
use Mockery;
use Tests\TestCase;

class TrendingControllerTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();

        $this->mock(TrendingRepositoriesInterface::class);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    public function mock($class)
    {
        $this->mock = Mockery::mock($class);

        $this->app->instance($class, $this->mock);

        return $this->mock;
    }

    /**
     * @test
     */
    public function fake_search_method_should_be_called()
    {

        $this->mock->shouldReceive('search')->once();

        $this->call('GET', 'api/repositories/search?created=2012-12-30');

    }

}
