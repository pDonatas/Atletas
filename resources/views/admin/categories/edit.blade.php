@extends('layouts.admin')
@section('content')
    <div class="col-lg-8">
        <section class="content-panel">
            <h4><i class="fa fa-angle-right"></i>Kategorijos redagavimas</h4>
            <div class="panel-body">
                <form method="post" action="{{route('admin.categories.update', $cat->id)}}">
                    @csrf
                    <div class="form-group">
                        <label for="category">Kategorijos pavadinimas</label>
                        <input type="text" name="category" id="category" class="form-control"
                               value="{{$cat->category}}">
                    </div>
                    <input type="submit" class="btn btn-outline-dark" value="Patvirtinti">
                </form>
            </div>
        </section>
    </div>
@endsection
