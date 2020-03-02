@extends('layouts.app')
@section('content')
    <div class="row">
        @forelse($chats as $chat)
            <a href="{{ URL::to(app()->getLocale().'/chat/' . $chat->id) }}">
                <?php
                if (Auth::id() != $chat->who)
                    $user = Helper::user($chat->who);
                else  $user = Helper::user($chat->whom);
                ?>
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
            {{__('chats.not_found_all')}}
        @endforelse
    </div>
@endsection
