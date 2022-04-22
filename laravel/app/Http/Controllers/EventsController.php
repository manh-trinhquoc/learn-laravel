<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::simplePaginate(10);

        return view('events.index')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $event = Event::create([
        //     $request->input()
        //      ]);
        $event = new Event;
        $event->name = $request->name;
        $event->max_attendees = $request->max_attendees;
        $event->description = $request->description;
        $event->venue = 'venue';
        $event->city = 'city';
        $event->zip = 'zip';
        $event->save();
        flash('Event created!')->success();

        return redirect()->route('events.show', $event);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    // public function show(Event $event)
    // {
    //     return view('events.show')->with('event', $event);
    // }
    public function show($id)
    {
        // $event = Event::findOrFail($id);
        $slug = $id;
        $event = Event::findBySlugOrFail($slug);
        return view('events.show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('events.edit')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        // $event->update([
        //     'name' => $request->name,
        //      'description' => $request->description
        // ]);
        $event->name = $request->name;
        $event->description = $request->description;
        $event->update();

        return redirect()
             ->route('events.edit', $event)
             ->with('message', 'Event updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        flash('Event: ' . $event->name . ' deleted!')->success();
        return redirect()
            ->route('events.index')
            ->with('message', 'The event: ' . $event->name . ' has been deleted!');
    }
}