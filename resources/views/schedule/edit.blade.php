@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-heading">{{__('schedule.edit')}}</div>
        <div class="card-body">
            @if(isset($form))
                {!! form($form) !!}
            @endif
        </div>
    </div>
@endsection
