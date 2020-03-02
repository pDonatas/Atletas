@extends('layouts.app')

@section('content')
    @forelse($trainers as $trainer)
        <li>
            {{$trainer->name}}
            @if($trainer->type == 1)
                @if(!Helper::isClient($trainer->id))
                    <br/><a href="{{route('trainers.select', [app()->getLocale(), $trainer->id])}}">
                        <button class="btn btn-outline-dark">{{__('trainers.select')}}</button>
                    </a>
                @endif
            @endif
        </li>
    @empty
        {{__('users.not_found_all')}}
    @endforelse
@endsection
