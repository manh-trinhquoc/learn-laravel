<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function show($id)
    {
        // return view('events.show')->with('id', $id);
        $data = [
             'name2' => 'Laravel Hacking and Coffee',
             'date' => date('Y-m-d')
             ];

        return view('events.show')->withId($id)->withName('Laravel hacking coffee')
         ->with($data);
    }

    public function category($category, $subcategory = 'all')
    {
        dd("Category: {$category} Subcategory: {$subcategory}");
    }

    public function index()
    {
        $events = [
                'Laravel Hacking and Coffee',
                'IoT with Raspberry Pi',
                'Free Vue.js Lessons'
            ];
        return view('events.index')->with('events', $events);
    }
}