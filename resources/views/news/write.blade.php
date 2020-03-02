@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">{{__('news.write_title')}}</div>
        <div class="card-body">
            <form method="post" action="{{route('news.submit', app()->getLocale())}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">{{__('news.title')}}</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category">{{__('news.category')}}</label>
                    <select name="category" id="category" class="form-control">
                        @foreach(Helper::getCategories() as $cat)
                            <option value="{{$cat->id}}">{{$cat->category}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">{{__('news.image')}}</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="text">{{__('news.text')}}</label>
                    <textarea name="text" id="text" class="form-control"></textarea>
                </div>
                <input type="submit" class="btn btn-outline-dark" value="{{__('news.write')}}">
            </form>
        </div>
    </div>
@endsection
