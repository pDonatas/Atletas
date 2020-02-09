@extends('layouts.app')
@section('content')
    @forelse($chats as $chat)
        <?php
        $user = Helper::user($chat->who); // Grąžina userio objekta
        ?>
        {{$user->name}}: {{$chat->text}}<br/>
    @empty
        {{__('chats.not_found')}}
    @endforelse
    <form method="post" action="{{route('chat.store', app()->getLocale())}}">
        @csrf
        <div class="form-group">
            <label for="text">{{__('chats.message')}}</label>
            <textarea class="form-control" name="text" id="text"></textarea>
        </div>
        <input type="hidden" name="chat_id" value="{{$chatid}}">
        <input type="submit" name="submit" class="form-control btn btn-outline-dark" value="{{__('chats.write')}}">
    </form>
@endsection
