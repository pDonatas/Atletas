@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">{{__('orders.list')}}</div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('orders.type')}}</th>
                    <th>{{__('orders.price')}}</th>
                    <th>{{__('orders.status')}}</th>
                    <th>{{__('orders.date')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{Helper::orderType($order->type)}}</td>
                        <td>{{$order->price/100}} &euro;</td>
                        <td>
                            {{Helper::orderStatus($order->status)}}
                            @if($order->status == 0) <a
                                href="{{route('orders.pay', [$app->getLocale(), $order->type, $order->id])}}">{{__('orders.pay')}}</a> @endif
                        </td>
                        <td>{{$order->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
