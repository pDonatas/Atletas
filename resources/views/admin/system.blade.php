@extends('layouts.admin')
@section('content')
    <div class="col-lg-8">
        <section class="content-panel">
            <h4><i class="fa fa-angle-right"></i>Sistemos administravimas</h4>
            <div class="panel-body">
                <form method="post" action="{{route('admin.system.update')}}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Svetainės pavadinimas:</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{$system->title}}">
                    </div>
                    <div class="form-group">
                        <label for="paysera_projectid">Paysera projekto id:</label>
                        <input type="text" name="paysera_projectid" value="{{$system->paysera_projectid}}"
                               id="paysera_projectid" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="paysera_password">Paysera projekto slaptažodis:</label>
                        <input type="password" name="paysera_password" value="{{$system->paysera_password}}"
                               id="paysera_password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price_subscription">Prenumeratos kaina (centais):</label>
                        <input type="text" name="price_subscription" value="{{$system->price_subscription}}"
                               id="price_subscription" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price_ads">Reklamos kaina (centais):</label>
                        <input type="text" name="price_ads" value="{{$system->price_ads}}" id="price_ads"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Sistemos statusas:</label>
                        <label class="switch">
                            <input name="online" type="checkbox" @if($system->online == 1) checked @endif>
                            <span class="slider"></span>
                        </label>
                    </div>
                    <input type="submit" name="ok" class="btn btn-outline-dark" value="Patvirtinti">
                </form>
            </div>
        </section>
    </div>
@endsection
