<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testEventDateTimeFieldIsACarbonObject()
    {
        $event = \App\Models\Event::factory()->create();
        $this->assertTrue(is_a($event->created_at, 'Illuminate\Support\Carbon'));
    }
}