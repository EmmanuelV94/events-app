<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Rules\RangeConflict;
use Illuminate\Support\Facades\Auth;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $year = date("Y");
        $month = date("m");
        $user_id = Auth::id();
        if ($request->year) {
            $year = $request->year;
        }

        if ($request->month) {
            $month = $request->month;
        }
        session(['year' => $year]);
        session(['month' => $month]);

        $events = Event::whereRaw(
            "(year(start_date) = " . $year . " AND month(start_date) = " . $month . ") OR " .
                "(year(end_date) = " . $year . " AND month(end_date) = " . $month . ") AND user_id = " . $user_id
        )->orderBy('start_date', 'asc')->get();
        return view('events.index', compact('events', 'year', 'month'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::orderBy('title', 'asc')->get();
        return view('events.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $now = date('Y-m-d');
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'string|max:500',
            'category_id' => 'required|integer',
            'start_date' => ['required', 'date', 'after_or_equal:' . $now, new RangeConflict(Auth::id(), 0)],
            'end_date' => ['required', 'date', 'after_or_equal:' . $now, 'after_or_equal:start_date', new RangeConflict(Auth::id(), 0)]
        ]);

        Event::create($request->post());
        return redirect(route('events.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
        $categories = Category::orderBy('title', 'asc')->get();
        return view('events.edit', compact('categories', 'event'));
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
        //
        $now = date('Y-m-d');
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'string|max:500',
            'category_id' => 'required|integer',
            'start_date' => ['required', 'date', 'after_or_equal:' . $now, new RangeConflict(Auth::id(), $event->id)],
            'end_date' => ['required', 'date', 'after_or_equal:' . $now, 'after_or_equal:start_date', new RangeConflict(Auth::id(), $event->id)]
        ]);

        $event->fill($request->post())->save();
        return redirect(route('events.index', ['year' => session('year'), 'month' => session('month')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
        $event->delete();
        return redirect(route('events.index', ['year' => session('year'), 'month' => session('month')]));
    }
}
