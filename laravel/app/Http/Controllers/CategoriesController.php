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

        // $eventsByCategory = Event::where('started_at', '>', Carbon::now()->subDays(0)->toDateTimeString())
        //     ->addSelect('category', 'slug', 'started_at')
        //     ->orderBy('category')
        //     ->orderBy('started_at')
        //     ->paginate(
        //         $perPage = 5,
        //         $columns = ['*'],
        //         $pageName = 'eventsByCategory'
        //     );

        // $data = array_merge($data, [
        //     'eventsByCategory' => $eventsByCategory,
        //     'eventsByCity' => $eventsByCity,
        // ]);

        return view('categories.index', $data);
    }
}
