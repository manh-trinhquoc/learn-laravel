<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $data = [
            'title_1' => 'Categories',
            'title_2' => 'Events by category',
            'title_3' => 'Events by category',
        ];

        return view('categories.index', $data);
    }
}
