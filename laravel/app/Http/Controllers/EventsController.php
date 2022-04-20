<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function show($id)
    {
        dd($id);
    }

    public function category($category, $subcategory = 'all')
    {
        dd("Category: {$category} Subcategory: {$subcategory}");
    }
}