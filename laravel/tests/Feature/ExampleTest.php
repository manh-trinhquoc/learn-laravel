<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // public function testHomepageContainsProjectName()
    // {
    //     $response = $this->get('/tasks');

    //     $response->assertSeeText('Laravel');
    // }


    public function testNonexistentEndpointReturns404()
    {
        $response = $this->get('/contact22222');

        $response->assertStatus(404);
    }
}