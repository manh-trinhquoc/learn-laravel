<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $data = [
            'title_1' => 'Build Faster with HackerPair',
            'title_2' => 'Learn, teach, hack, and make friends with developers in your city.',
            'content_title' => 'The Latest Events',
            'events' => []
        ];
        return view('welcome.index', $data);
    }
}