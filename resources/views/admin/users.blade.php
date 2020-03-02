@extends('layouts.admin')
@section('content')
    <div class="col-lg-8">
        <section class="content-panel">
            <h4><i class="fa fa-angle-right"></i>Vartotojų registravimas</h4>
            <div class="panel-body">
                <form method="post" action="{{route('admin.users.add')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{__('user.name')}}</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Surname">{{__('user.surname')}}</label>
                        <input type="text" name="Surname" id="Surname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">{{__('user.email')}}</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">{{__('user.password')}}</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="type">{{__('user.type')}}</label>
                        <select class="form-control" name="type">
                            <option value="0">Vartotojas</option>
                            <option value="1">Treneris</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-outline-dark" value="{{__('user.register')}}">
                </form>
            </div>
        </section>
        <section class="content-panel">
            <h4><i class="fa fa-angle-right"></i> Vartotojų redagavimas</h4>
            <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                    <thead>
                    <tr>
                        <th class="numeric">#</th>
                        <th>Vardas</th>
                        <th>Pavardė</th>
                        <th>Statusas</th>
                        <th>Veiksmas</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\User::all() as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->Surname}}</td>
                            <td>{{Helper::getType($user->type)}}</td>
                            @if($user->type != 2)
                                <td>
                                    <a href="/admin/user/edit/{{$user->id}}">Redaguoti</a>
                                    <a href="/admin/user/remove/{{$user->id}}">Ištrinti</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </section>
    </div>
@endsection
