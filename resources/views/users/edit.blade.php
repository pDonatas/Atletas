@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            {{__('user.profile_edit')}}
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{route('user.submit', app()->getLocale())}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">
                        {{__('user.name')}}
                    </label>
                    <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control">
                    <label for="surname">
                        {{__('user.surname')}}
                    </label>
                    <input type="text" name="surname" id="surname" value="{{$user->Surname}}" class="form-control">
                    <label for="email">
                        {{__('user.email')}}
                    </label>
                    <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control">
                    <label for="password">
                        {{__('user.new_password')}}
                    </label>
                    <input type="password" name="password" id="password" class="form-control">
                    <label for="photo">
                        {{__('user.new_photo')}}
                    </label>
                    <input type="file" name="photo" id="photo" class="form-control">
                    @if($user->type == 1)
                        <label for="training">
                            {{__('user.training_type')}}
                        </label>
                        <input type="text" name="training" id="training" value="{{$user->job_type}}"
                               class="form-control">
                        <label for="video">
                            {{__('user.video')}}
                        </label>
                        <input type="text" name="video" id="video" value="{{$user->video}}" class="form-control">
                    @else
                        <label for="training">
                            {{__('user.training_type_search')}}
                        </label>
                        <input type="text" name="training" id="training" value="{{$user->job_type}}"
                               class="form-control">
                    @endif
                    <label for="job_place">
                        {{__('user.job_place')}}
                    </label>
                    <input type="text" name="job_place" id="job_place" value="{{$user->job_place}}"
                           class="form-control">
                    <input type="submit" class="btn btn-block btn-outline-dark form-control"
                           value="{{__('validation.submit')}}">
                </div>
            </form>
        </div>
    </div>
@endsection
