@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">{{__('ads.new')}}</div>
        <div class="card-body">
            <form method="post" action="{{route('ads.submit', app()->getLocale())}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">{{__('ads.title')}}</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image">{{__('ads.image')}}</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="url">{{__('ads.url')}}</label>
                    <input type="text" name="url" id="url" class="form-control">
                </div>
                <input type="submit" class="btn btn-outline-dark" value="{{__('ads.new')}}">
            </form>
        </div>
    </div>
@endsection
