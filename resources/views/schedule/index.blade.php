@extends('layouts.app')
@section('content')
    @if(Auth::user()->type == 1)
        <div class="card">
            <div class="card-header">{{__('schedule.edit')}}</div>
            <div class="card-body">
                <form method="post" action="{{route('schedule.edit.part', [app()->getLocale(), 2])}}">
                    @csrf
                    <div class="form-group">
                        <label for="user">{{__('schedule.user')}}</label>
                        <select class="form-control" name="user" id="user">
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" class="btn btn-outline-dark form-control" value="{{__('page.Submit')}}">
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">{{__('schedule.add')}}</div>
            <div class="card-body">
                <form method="post" action="{{route('schedule.store', app()->getLocale())}}">
                    @csrf
                    <div class="form-group">
                        <label for="day">{{__('schedule.day')}}</label>
                        <select class="form-control" name="day" id="day">
                            <?php
                            for ($i = 1; $i <= 7; $i++)
                                echo '<option value=' . $i . '>' . trans("schedule.day" . $i) . '</option>';
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="user">{{__('schedule.user')}}</label>
                        <select class="form-control" name="user" id="user">
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="time">{{__('schedule.time')}}</label>
                        <input type="time" class="form-control" name="time" id="time">
                    </div>
                    <div class="form-group">
                        <label for="event">{{__('schedule.event')}}</label>
                        <input type="text" name="event" id="event" class="form-control">
                    </div>
                    <input type="submit" class="btn btn-outline-dark form-control" value="{{__('page.Submit')}}">
                </form>
            </div>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            {{__('schedule.my')}}
        </div>
        <div class="card-body">
            <table class="table">
                @forelse($schedule as $event)
                    {{Helper::day($event->day)}}:{{$event->text}}
                @empty
                    {{__('schedule.empty')}}
                @endforelse
            </table>

        </div>
    </div>
@endsection
