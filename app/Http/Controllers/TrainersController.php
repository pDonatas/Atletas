<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        $us = new UserService();
        $trainers = $us->findAllTrainers();
        return view('trainers.index', [
            'trainers' => $trainers
        ]);
    }

    public function viewSearch()
    {
        return view('trainers.viewsearch');
    }

    public function search(Request $request)
    {
        $us = new UserService();
        $city = $request->get('city');
        $type = $request->get('type');
        if (Auth::user()->type == 0)
            $trainers = $us->findTrainers($city, $type);
        else if (Auth::user()->type == 1)
            $trainers = $us->findUsers($city, $type);
        return view('trainers.search', [
            'trainers' => $trainers
        ]);
    }

    public function select($lang, $id)
    {
        #pragma unused $lang
        $client = new Client();
        $client->fill([
            'client' => Auth::id(),
            'trainer' => $id,
            'client_submit' => true,
            'trainer_submit' => false
        ]);
        $client->save();
        //TODO: issiust treneriui emaila
        return redirect('/');
    }
}
