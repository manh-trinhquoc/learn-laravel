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
        $perPage = 10;

        $recentlyPostedEvents = DB::table(function ($query) use ($eventTableName) {
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
            ->select($categoryTableName . '.id as id')
            ->addSelect($categoryTableName . '.name as name')
            ->addSelect('ranked_row.name as event_name')
            ->addSelect('ranked_row.slug as event_slug')
        // ->toSql()
        ->paginate(
            $perPage = $perPage,
        )
        // ->get()
        // ->toArray()
        // ->items()
        ;
        // var_dump($recentlyPostedEvents);
        // die(__FILE__);

        $upcommingEvents = DB::table(function ($query) use ($eventTableName) {
            $query->selectRaw(
                '*,
                name as event_name,
                @category_rank := IF(@category_current = category_id, @category_rank + 1, 1) as category_rank, @category_current := category_id as category_current'
            )
            ->from($eventTableName)
            ->where('started_at', '>', Carbon::now()->subDays(-30)->toDateTimeString())
            ->orderBy('category_id')
            ->orderBy('started_at')
            ->orderBy('id', 'DESC');
        }, 'ranked_row')
            ->where('category_rank', '<=', 1)
            ->leftJoin($categoryTableName, 'category_id', '=', $categoryTableName . '.id')
            ->select($categoryTableName . '.id as id')
            ->addSelect($categoryTableName . '.name as name')
            ->addSelect('ranked_row.name as event_name')
            ->addSelect('ranked_row.slug as event_slug')
        // ->toSql()
        ->paginate(
            $perPage = $perPage,
        )
        ;

        $recentlyPostedItems = $recentlyPostedEvents->items();
        $recentlyPostedItems = collect($recentlyPostedItems)->keyBy('id');
        $upcommingItems = $upcommingEvents->items();
        $upcommingItems = collect($upcommingItems)->keyBy('id');
        // var_dump($upcommingItems);
        // die(__FILE__);

        $data = array_merge($data, [
            'recentlyPostedItems' => $recentlyPostedItems,
            'upcommingItems' => $upcommingItems,
            'recentlyPostedEvents' => $recentlyPostedEvents,
        ]);

        return view('categories.index', $data);
    }
}
