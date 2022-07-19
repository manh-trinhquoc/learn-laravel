<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use Carbon\Carbon;

class CategoriesController extends Controller
{
    public function index()
    {
        $data = [
            'title_1' => 'Categories',
            'title_2' => 'Events by category',
            'title_3' => 'Events by category',
        ];

        $recentlyPostedEventIdList = Event::selectRaw('MAX(created_at)')->groupBy('category_id')
            // ->toSql()
            ->get()->transform(function ($item, $key) {
                return [
                    'created_at' => $item['MAX(created_at)']
                ];
            })->toArray();
        var_dump($recentlyPostedEventIdList);
        die(__FILE__);

        $eventsRecentlyPosted = Category::withEventList([
            ['created_at' => '2022-07-19 02:17:33']
        ], ['id', 'slug', 'name'])
        // $eventsRecentlyPosted = Category::withEventList($recentlyPostedEventIdList, ['id', 'slug', 'name'])
            ->toSql()
        // ->get()
        // // ->paginate(
        // //     $perPage = 25,
        // // )
        // ->toArray();
        ;
        // var_dump($eventsRecentlyPosted);
        // die(__FILE__);

        $upcomingEventIdList = Event::selectRaw('MIN(started_at)')
            ->where('started_at', '>', Carbon::now()->subDays(-0)->toDateTimeString())
            ->groupBy('category_id')
            ->get()
            ->transform(function ($item, $key) {
                return [
                    'started_at' => $item['MIN(started_at)']
                ];
            })
            ->toArray();

        // var_dump($upcomingEventIdList);
        // die(__FILE__);

        $eventsUpcomming = Category::withEventList($upcomingEventIdList, ['id', 'slug', 'name'])
            // ->toSql()
        ->get()
        // ->paginate(
        //     $perPage = 25,
        // )
        ->toArray();
        ;
        var_dump($eventsUpcomming);
        die(__FILE__);

        $eventsByCategory = $eventsUpcomming;
        $data = array_merge($data, [
            'eventsByCategory' => $eventsByCategory,
            // 'eventsByCity' => $eventsByCity,
        ]);

        return view('categories.index', $data);
    }
}
