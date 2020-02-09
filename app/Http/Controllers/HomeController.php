<?php

namespace App\Http\Controllers;

use App\Http\Services\AdsService;
use App\Http\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Services\NewsService;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news = new NewsService();
        $advertisements = new AdsService();
        $us = new UserService();

        $ads = $advertisements->getRand();
        $lastnews = $news->all();
        $newtrainers = $us->findAllTrainers()->sortBy('id')->take(6);
        return view('home', [
            'ads' => $ads,
            'news' => $lastnews,
            'trainers' => $newtrainers
        ]);
    }
}
