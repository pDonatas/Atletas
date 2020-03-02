<?php

namespace App\Http\Services;

use App\Order;
use App\System;
use App\Chat;
use Illuminate\Http\Request;
use App\WebToPay;
use Illuminate\Support\Facades\Auth;

class PayService
{
    function get_self_url()
    {
        $s = substr(strtolower($_SERVER['SERVER_PROTOCOL']), 0,
            strpos($_SERVER['SERVER_PROTOCOL'], '/'));

        if (!empty($_SERVER["HTTPS"])) {
            $s .= ($_SERVER["HTTPS"] == "on") ? "s" : "";
        }

        $s .= '://' . $_SERVER['HTTP_HOST'];

        if (!empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != '80') {
            $s .= ':' . $_SERVER['SERVER_PORT'];
        }

        $s .= dirname($_SERVER['SCRIPT_NAME']);

        return $s;
    }

    public function pay($price, $order)
    {
        try {
            $system = System::findOrFail(1);
            $self_url = $this->get_self_url();

            $request = WebToPay::redirectToPayment(array(
                'projectid' => $system->paysera_projectid,
                'sign_password' => $system->paysera_password,
                'orderid' => $order->id,
                'amount' => $price,
                'currency' => 'EUR',
                'country' => 'LT',
                'p_email' => Auth::user()->email,
                'accepturl' => $self_url . app()->getLocale() . '/pay/accept',
                'cancelurl' => $self_url . app()->getLocale() . '/pay/cancel',
                'callbackurl' => $self_url . app()->getLocale() . '/pay/callback',
                'test' => 1,
            ));
        } catch (WebToPayException $e) {
            $message = new Chat();
            $message->fill([
                'chat_id' => 0,
                'text' => 'Paysera klaida: ' . $e->getMessage() . '\nUžsakymo id: ' . $order->id,
                'who' => 0
            ]);
            $message->save();
            return redirect(route('error_pay', app()->getLocale()));
        }

    }

    public function submit(array $params)
    {
        //Sutikrinam ar duomenys egzistuoja duombazej
        $order = Order::findOrFail($params['orderid']);
        if ($order == null) return false; // Toks užsakymas neegzistuoja
        if ($order->price != $params['amount']) return false; // Kaina neatitinka
        if ($params['status'] != 1) return false; //Neužbaigtų mokėjimų nepriimam
        if ($order->status == 1) return false; // Mokėjimas jau įvykdytas, daugiau kartų mokėti neleidžiama
        if ($params['p_email'] != Auth::user()->email) return false; //El. Paštai neatitinka
        return true;
    }
}
