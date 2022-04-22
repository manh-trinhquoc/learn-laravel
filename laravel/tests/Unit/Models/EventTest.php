<?php

namespace Tests\Unit\Models;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class EventTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testEventDateTimeFieldIsACarbonObject()
    {
        $event = \App\Models\Event::factory()->make();
        $this->assertTrue(is_a($event->started_at, 'Illuminate\Support\Carbon'));
    }

    public function testEventNameCapitalizationIsCorrect()
    {
        $factory = \App\Models\Event::factory();
        $event = $factory->make(
            [
                'name' => "have fun WITH the Raspberry Pi"
            ]
        );

        // $event = $factory->state([
        //     'name' => 'test state'
        // ])->make();

        $this->assertEquals($event->name, "Have Fun with the Raspberry Pi");
    }
}