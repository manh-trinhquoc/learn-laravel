<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use Carbon\Carbon;
use DB;

class CategoriesController extends Controller
{
    public function index()
    {
        $data = [
            'title_1' => 'Categories',
            'title_2' => 'Events by category',
            'title_3' => 'Events by category',
        ];

        $eventTableName = app(Event::class)->getTable();
        $categoryTableName = app(Category::class)->getTable();
        $recentlyPostedEventTable = DB::table(function ($query) use ($eventTableName) {
            $query->selectRaw(
                '*,
                name as event_name,
                @category_rank := IF(@category_current = category_id, @category_rank + 1, 1) as category_rank, @category_current := category_id as category_current'
            )
            ->from($eventTableName)
            ->orderBy('category_id')
            ->orderBy('created_at')
            ->orderBy('id', 'DESC');
        }, 'ranked_row')
            ->where('category_rank', '<=', 1)
            ->leftJoin($categoryTableName, 'category_id', '=', $categoryTableName . '.id')
            ->select($categoryTableName . '.name as category_name')
            ->addSelect('ranked_row.name as name ')
            ->addSelect('ranked_row.slug as slug ')
        // ->toSql()
        ->paginate(
            $perPage = 5,
        )
        // ->get()
        ->toArray()
        ;
        var_dump($recentlyPostedEventTable);
        die(__FILE__);

        $eventsRecentlyPosted = Category::addSelect([
            'recent_post' => $recentlyPostedEventTable
                ->select('*')
                ->whereColumn('category_id', 'categories.id')
                ->limit(1)
        ])
        // ->toSql()
        ->get()
        // // ->paginate(
        // //     $perPage = 25,
        // // )
        ->toArray();
        ;
        var_dump($eventsRecentlyPosted);
        die(__FILE__);

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
        ]);

        return view('categories.index', $data);
    }
}
