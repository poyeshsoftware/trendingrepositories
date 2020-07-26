<?php

namespace Tests\Feature;

use App\Http\Requests\TrendingRequest;
use Illuminate\Validation\Validator;
use Tests\TestCase;

class TrendingRequestTest extends TestCase
{

    private $rules;

    /** @var Validator */
    private $validator;

    public function setUp(): void
    {
        parent::setUp();

        $this->validator = app()->get('validator');

        $this->rules = (new TrendingRequest())->rules();
    }

    /**
     * @test
     */
    public function form_should_not_validate_with_empty_request()
    {
        $result = $this->validator->make([

        ], $this->rules)->passes();

        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function form_should_validate_with_query()
    {
        $result = $this->validator->make([
            'query' => 'trending',
        ], $this->rules)->passes();

        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function form_should_validate_with_language()
    {
        $result = $this->validator->make([
            'language' => 'php'
        ], $this->rules)->passes();

        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function form_should_validate_with_language_and_created_date()
    {
        $result = $this->validator->make([
            'language' => 'php',
            'created' => '2012-12-30'
        ], $this->rules)->passes();

        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function form_should_not_validate_with_language_and_wrong_created_date()
    {
        $result = $this->validator->make([
            'language' => 'php',
            'created' => '2012'
        ], $this->rules)->passes();

        $this->assertFalse($result);
    }


    /**
     * @test
     */
    public function form_should_validate_with_order_by_desc()
    {
        $result = $this->validator->make([
            'language' => 'php',
            'order' => 'desc',
        ], $this->rules)->passes();

        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function form_should_validate_with_order_by_asc()
    {
        $result = $this->validator->make([
            'language' => 'php',
            'order' => 'asc',
        ], $this->rules)->passes();

        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function form_should_not_validate_with_wrong_order()
    {
        $result = $this->validator->make([
            'language' => 'php',
            'order' => 'hi',
        ], $this->rules)->passes();

        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function form_should_validate_with_per_page()
    {
        $result = $this->validator->make([
            'language' => 'php',
            'per_page' => '50',
        ], $this->rules)->passes();

        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function form_should_validate_with_wrong_per_page()
    {
        $result = $this->validator->make([
            'language' => 'php',
            'per_page' => 'hi',
        ], $this->rules)->passes();

        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function form_should_validate_with_sort_by_stars()
    {
        $result = $this->validator->make([
            'language' => 'php',
            'sort' => 'stars',
        ], $this->rules)->passes();

        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function form_should_validate_with_sort_by_forks()
    {
        $result = $this->validator->make([
            'language' => 'php',
            'sort' => 'forks',
        ], $this->rules)->passes();

        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function form_should_not_validate_with_wrong_sort()
    {
        $result = $this->validator->make([
            'language' => 'php',
            'sort' => 'haha',
        ], $this->rules)->passes();

        $this->assertFalse($result);
    }
}
