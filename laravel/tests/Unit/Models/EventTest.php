<?php

namespace Tests\Unit\Models;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testEventDateTimeFieldIsACarbonObject()
    {
        // $event = self::factory(\App\Models\Event::class)->makeOne();
        $event = \App\Models\Event::factory()->create();
        // var_dump($event->created_at);
        // die;
        // $event = \App\Models\User::factory()->makeOne();
        $this->assertTrue(is_a($event->created_at, 'Illuminate\Support\Carbon'));
    }
}