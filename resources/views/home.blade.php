@extends('layouts.app')

@section('content')
    @auth
        @include('trainers.viewsearch')
    @endauth
    @include('ads.big', ['data' => $ads])
    <div class="card">
        <div class="card-header">Naujienos</div>
        <div class="card-body">
            <div class="row">
                @foreach($news as $new)
                    <div class="col-md-4">
                        <article>
                            <div class="caption"><a
                                    href="/categories/{{Helper::cat($new->category)}}">{{Helper::cat($new->category)}}</a>
                            </div>
                            <img class="feature-small" src="{{$new->image}}" alt=""/>
                            <div class="bottom">{{$new->created_at}} <span class="right"><a href="{{route("user.profile", [
                                        app()->getLocale(),
                                        $new->author
                                    ])}}">{{Helper::user($new->author)->name}}</a></span></div>
                            <div class="title"><a href="/news/{{$new->slug}}">{{$new->title}}</a></div>
                            <p>{{substr($new->text, 0, 20)."..."}}</p>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
