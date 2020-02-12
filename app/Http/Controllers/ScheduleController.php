<?php

namespace App\Http\Controllers;

use App\Helpers;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (Auth::user()->type == 0)
            return view('schedule.index', [
                'schedule' => Schedule::user(Auth::id())
            ]);
        else {
            return view('schedule.index', [
                'schedule' => Schedule::user(Auth::id()),
                'users' => Helpers::getClients(Auth::id())
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $sched = new Schedule();
        $sched->fill([
            'user' => $request->input('user'),
            'trainer' => Auth::id(),
            'day' => $request->input('day'),
            'time' => $request->input('time'),
            'text' => $request->input('event')
        ]);
        $sched->save();
        return redirect(route('schedule.index', app()->getLocale()));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('schedule.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('schedule.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->update([
            'user' => $request->input('user'),
            'trainer' => Auth::id(),
            'day' => $request->input('day'),
            'time' => $request->input('time'),
            'text' => $request->input('text')
        ]);
        $schedule->save();
        return redirect(route('schedule.show', app()->getLocale(), $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        return redirect(route('schedule.index', app()->getLocale()));
    }
}
