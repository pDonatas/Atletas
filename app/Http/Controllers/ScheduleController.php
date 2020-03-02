<?php

namespace App\Http\Controllers;

use App\Helpers;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\FormBuilder;

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

    public function editparted($lang, $id, FormBuilder $formBuilder, Request $request)
    {
        if ($id == 2) {
            $user = $request->input('user');
            session(['training_user' => $user]);
            $form = $formBuilder->createByArray([
                [
                    'name' => 'day',
                    'label' => trans('schedule.day'),
                    'type' => Field::SELECT,
                    'choices' => [
                        '1' => trans('schedule.day1'),
                        '2' => trans('schedule.day2'),
                        '3' => trans('schedule.day3'),
                        '4' => trans('schedule.day4'),
                        '5' => trans('schedule.day5'),
                        '6' => trans('schedule.day6'),
                        '7' => trans('schedule.day7'),
                    ]
                ],
                [
                    'name' => 'ok',
                    'label' => trans('page.Submit'),
                    'type' => Field::BUTTON_SUBMIT,
                    'attr' => [
                        'class' => 'btn btn-outline-dark form-control'
                    ]
                ],
            ], [
                'method' => 'POST',
                'url' => route('schedule.edit.part', [app()->getLocale(), 3])
            ]);
            return view('schedule.edit', compact('form'));
        } else if ($id == 3) {
            $day = $request->input('day');
            return view('schedule.edit', [
                'schedule' => DB::table('schedules')
                    ->where('user', session('training_user'))
                    ->where('trainer', Auth::id())
                    ->where('day', $day)
                    ->get()
            ]);
        }
        return abort(404);
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
