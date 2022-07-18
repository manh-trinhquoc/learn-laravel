<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use App\Models\State;
use Carbon\Carbon;

class LocationsController extends Controller
{
    public function index()
    {
        $data = [
            'title_1' => 'Event Locations',
            'title_2' => 'Events summarized by city and state',
            'title_3' => 'Upcoming Events by State',
            'title_4' => 'Upcoming Events by City',
        ];

        // $tableEvent = app(Event::class)->getTable();
        // $tableState = app(State::class)->getTable();
        // $eventsByState = DB::table($tableEvent)
        //     ->leftJoin($tableState, $tableEvent . '.state_id', '=', $tableState . '.id')
        //     ->where('started_at', '>', Carbon::now()->toDateTimeString())
        //     ->select('id', 'name', 'slug', 'started_at', 'state_id')
        //     ->orderBy('state_id')
        //     ->get();
        $eventsByState = Event::where('started_at', '>', Carbon::now()->subDays(0)->toDateTimeString())
            ->withStatesTable()
            ->addSelect('slug', 'started_at')
            ->orderBy('state_name')
            ->orderBy('started_at')
            // ->toSql();
            // ->get();
            ->paginate(
                $perPage = 15,
                $columns = ['*'],
                $pageName = 'eventsByState'
            );

        $eventsByCity = Event::where('started_at', '>', Carbon::now()->toDateTimeString())
            ->withStatesTable()
            ->addSelect('city', 'slug', 'started_at')
            ->orderBy('city')
            ->orderBy('started_at')
            // ->toSql();
            // ->get();
            ->paginate(
                $perPage = 10,
                $columns = ['*'],
                $pageName = 'eventsByCity'
            );
        // var_dump($eventsByState->count());
        // foreach ($eventsByState as $event) {
        //     var_dump($event->state_name);
        //     var_dump($event->started_at->format('D M/d/Y H:i'));
        // }
        $data = array_merge($data, [
            'eventsByState' => $eventsByState,
            'eventsByCity' => $eventsByCity,
        ]);

        return view('locations.index', $data);
    }
}
