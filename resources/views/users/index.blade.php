@extends('layouts.app')
@section('content')
    <div class="row">
        @forelse($users as $user)
            <a href="
            {{route('user.profile', [
                app()->getLocale(),
                $user->id
            ])}}" title="{{$user->name}}">
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-img">
                            <img src="{{$user->photo}}" alt=""/>
                        </div>
                        <div class="card-img-bottom">
                            {{$user->name}}
                        </div>
                    </div>
                </div>
            </a>
        @empty
            {{__('user.not_found_all')}}
        @endforelse
    </div>
@endsection
