<?php

namespace App\Http\Controllers;

use App\Ads;
use App\Chat;
use App\Http\Services\PayService;
use App\Order;
use App\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function payAccept($lang)
    {
        $params = array();
        parse_str(base64_decode(strtr($_GET['data'], array('-' => '+', '_' => '/'))), $params);
        $payservice = new PayService();

        //Patikrinam ar isvis toks uzsakymas egzistuoja ir ar visi parametrai teisingi
        if ($payservice->submit($params)) {
            $order = Order::findOrFail($params['orderid']);
            $order->status = 1; // Sumokėta
            $order->save(); //Išsaugom
            if ($order->type == 1) {
                // Atnaujinam vartotojo prenumeratą
                $user = Auth::user();
                $user->subscription = true;
                $user->subscribe_until = strtotime("+1 month");
                $user->save();
            } else if ($order->type == 2) {
                $ad = Ads::findOrFail($order->other_id);
                $ad->payed = true;
                $ad->payed_until = strtotime("+1 month");
                $ad->save();
            }
            //
            return view('pay.accept');
        }
        //Nusiunčiam klaidos žinutę administracijai
        $message = new Chat();
        $message->fill([
            'chat_id' => 0,
            'text' => 'Bandymas apeiti užsakymų patvirtinimo sistemą!
            Užsakymo id:' . $params['orderid'] . '\nVartotojo id:' . Auth::id(),
            'who' => 0
        ]);
        $message->save();
        return view('pay.error'); //Grąžinam klaidą, nes toks orderis neegzistuoja
    }

    public function payCancel($lang)
    {
        return view('pay.cancel');
    }

    public function payError($lang)
    {
        return view('pay.error');
    }

    public function pay($lang, $type, $id)
    {
        $payservice = new PayService();
        $system = new System();
        $order = Order::findOrFail($id);
        if ($type == 1) { //Mokėjimas už registraciją
            return $payservice->pay($order->price, $order);
        } else if ($type == 2) { //Mokėjimas už straipsnį
            return $payservice->pay($order->price, $order);
        }
        return redirect(route('orders.index', app()->getLocale()));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::findByUser(Auth::id());
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
