@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">{!! __('orders.title') !!}</div>
        <div class="card-body">
            <div class="alert alert-success">
                {!! __('orders.success') !!}
            </div>
        </div>
    </div>
@endsection
