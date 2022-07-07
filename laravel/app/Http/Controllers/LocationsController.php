<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public function index()
    {
        $data = [
            'title_1' => 'Event Locations',
            'title_2' => 'Events summarized by city and state',
            'title_3' => 'Upcoming Events by State',
            'title_4' => 'Popular Cities',
        ];

        return view('locations.index', $data);
    }
}
