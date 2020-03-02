@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">{!! __('orders.title') !!}</div>
        <div class="card-body">
            <div class="alert alert-danger">
                {!! __('orders.cancel') !!}
            </div>
        </div>
    </div>
@endsection
