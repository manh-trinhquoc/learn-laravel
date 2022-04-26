<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatusCodeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_front_page_return_200()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // public function testHomepageContainsProjectName()
    // {
    //     $response = $this->get('/tasks');

    //     $response->assertSeeText('Laravel');
    // }


    public function test_none_Existent_Endpoint_Returns_404()
    {
        $response = $this->get('/contact22222');

        $response->assertStatus(404);
    }

    public function test_redirect_Returns_302()
    {
        $response = $this->get('/redirect');

        $response->assertStatus(302);
    }
}