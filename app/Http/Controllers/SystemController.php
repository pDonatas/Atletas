<?php

namespace App\Http\Controllers;

use App\System;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $system = System::findOrFail(1);
        return view('admin.system', compact('system'));
    }

    public function update(Request $request)
    {
        $system = System::findOrFail(1);
        $system->update([
            'title' => $request->get('title'),
            'paysera_projectid' => $request->get('paysera_projectid'),
            'paysera_password' => $request->get('paysera_password'),
            'online' => $request->get('online') == "on" ? 1 : 0,
            'price_subscription' => $request->get('price_subscription'),
            'price_ads' => $request->get('price_ads')
        ]);
        $system->save();
        return redirect()->back();
    }
}
