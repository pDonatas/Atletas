@extends('layouts.admin')
@section('content')
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">{{__('news.edit_title')}}</div>
            <div class="panel-body">
                <form method="post" action="{{route('admin.news.edit', $news->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">{{__('news.title')}}</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{$news->title}}">
                    </div>
                    <div class="form-group">
                        <label for="category">{{__('news.category')}}</label>
                        <select name="category" id="category" class="form-control">
                            @foreach(Helper::getCategories() as $cat)
                                <option @if($cat->id == $news->cat) selected
                                        @endif value="{{$cat->id}}">{{$cat->category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">{{__('news.image')}}</label>
                        <input type="file" name="image" id="image" class="form-control">
                        Dabartinė: <img src="{{$news->image}}" width="150" height="50"/>
                    </div>
                    <div class="form-group">
                        <label for="text">{{__('news.text')}}</label>
                        <textarea name="text" id="text" class="form-control">{{$news->text}}</textarea>
                    </div>
                    <input type="submit" class="btn btn-outline-dark" value="{{__('news.write')}}">
                </form>
            </div>
        </div>
    </div>
@endsection
