<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NavigationBarTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_location_link_takes_user_to_locations_index()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->clickLink('Laravel Hacking and Coffee')
             ->assertPathIs('/events/42');
        });
    }
}