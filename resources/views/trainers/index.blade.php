@extends('layouts.appBasic')
@section('content')
    <div class="card">
        <div class="card-header">{{__('trainers.title')}}</div>
        <div class="card-body">
            @forelse($trainers as $trainer)
                <li>
                    {{$trainer->name}}
                    @if($trainer->type == 1)
                        @if(!Helper::isClient($trainer->id))
                            <br/><a href="{{route('trainers.select', app()->getLocale())}}">
                                <button class="btn btn-outline-dark">{{__('trainers.select')}}</button>
                            </a>
                        @endif
                    @endif
                </li>
            @empty
                {{__('user.not_found_all')}}
            @endforelse
        </div>
    </div>
@endsection
