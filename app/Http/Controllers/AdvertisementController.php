<?php

namespace App\Http\Controllers;

use App\Ads;
use App\News;
use App\Order;
use App\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function New()
    {
        return view('ads.new');
    }

    public function Submit(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'url' => 'required'
        ]);
        $ads = new Ads();
        $ads->title = $request->input('title');
        $ads->url = $request->input('url');
        $ads->image = '/img/404.png';
        $ads->payed = false;
        $ads->payed_until = 0;
        $ads->save();

        $image = $request->file('image');
        if (!empty($image)) {
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();

            $image = '/img/ads/' . $imageName;

            request()->image->move(public_path('img/ads'), $imageName);

            $ads->update([
                'image' => $image
            ]);
        }

        $order = new Order();
        $system = System::findOrFail(1);
        $order->fill([
            'user' => Auth::id(),
            'type' => 2,
            'price' => $system->price_ads,
            'status' => 0,
            'other_id' => $ads->id
        ]);
        $order->save();

        return redirect(url()->previous());
    }
}
