@extends('layouts.admin')
@section('content')
    <div class="col-lg-8">
        <section class="content-panel">
            <h4><i class="fa fa-angle-right"></i>Vartotojų redagavimas</h4>
            <div class="panel-body">
                <form method="post" action="{{route('admin.user.update', $user->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{__('user.name')}}</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="Surname">{{__('user.surname')}}</label>
                        <input type="text" name="Surname" id="Surname" class="form-control" value="{{$user->Surname}}">
                    </div>
                    <div class="form-group">
                        <label for="email">{{__('user.email')}}</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label for="password">{{__('user.password')}}</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="type">{{__('user.type')}}</label>
                        <select class="form-control" name="type">
                            <option @if($user->type == 0) selected @endif value="0">Vartotojas</option>
                            <option @if($user->type == 1) selected @endif value="1">Treneris</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-outline-dark" value="{{__('user.edit')}}">
                </form>
            </div>
        </section>
    </div>
@endsection
