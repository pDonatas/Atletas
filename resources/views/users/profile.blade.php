@extends('layouts.appBasic')
@section('content')
    <div class="profile-big text-center">
        <div class="card">
            <div class="card-header">{{$user->name}}</div>
            <div class="card-body">
                <img src="{{$user->photo}}" alt="{{$user->name}}"/>
                <hr>
                {{$user->name}}
            </div>
            <div class="card-footer">
                <ul class="list-group">
                    <li class="list-group-item">{{__('user.name')}}: {{$user->name}}</li>
                    <li class="list-group-item">{{__('user.type')}}: {{Helper::getType($user->type)}}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
