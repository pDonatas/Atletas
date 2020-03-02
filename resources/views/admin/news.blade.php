@extends('layouts.admin')
@section('content')
    <div class="col-lg-8">
        <section class="content-panel">
            <h4><i class="fa fa-angle-right"></i> Naujienos patvirtinimas</h4>
            <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                    <thead>
                    <tr>
                        <th class="numeric">#</th>
                        <th>Pavadinimas</th>
                        <th>Autorius</th>
                        <th>Statusas</th>
                        <th>Veiksmas</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\News::waiting() as $news)
                        <tr>
                            <td>{{$news->id}}</td>
                            <td>{{$news->title}}</td>
                            <td>{{Helper::user($news->author)->name}}</td>
                            <td>{{Helper::status($news->submited)}}</td>
                            <td>
                                <a href="/admin/news/submit/{{$news->id}}">Patvirtinti</a>
                                <a href="/admin/news/remove/{{$news->id}}">Ištrinti</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </section>
        <section class="content-panel">
            <h4><i class="fa fa-angle-right"></i>{{__('news.write_title')}}</h4>
            <div class="panel-body">
                <form method="post" action="{{route('admin.news.submit', app()->getLocale())}}"
                      enctype="multipart/form-data">
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
        </section>
        <section class="content-panel">
            <h4><i class="fa fa-angle-right"></i> Naujienos redagavimas</h4>
            <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                    <thead>
                    <tr>
                        <th class="numeric">#</th>
                        <th>Pavadinimas</th>
                        <th>Autorius</th>
                        <th>Statusas</th>
                        <th>Veiksmas</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\News::all() as $news)
                        <tr>
                            <td>{{$news->id}}</td>
                            <td>{{$news->title}}</td>
                            <td>{{Helper::user($news->author)->name}}</td>
                            <td>{{Helper::status($news->submited)}}</td>
                            <td>
                                <a href="/admin/news/edit/{{$news->id}}">Redaguoti</a>
                                <a href="/admin/news/remove/{{$news->id}}">Ištrinti</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </section>
        <hr/>
        <section class="content-panel">
            <h4><i class="fa fa-angle-right"></i>Kategorijos pridėjimas</h4>
            <div class="panel-body">
                <form method="post" action="{{route('admin.categories.add')}}">
                    @csrf
                    <div class="form-group">
                        <label for="category">Kategorijos pavadinimas</label>
                        <input type="text" name="category" id="category" class="form-control">
                    </div>
                    <input type="submit" class="btn btn-outline-dark" value="Patvirtinti">
                </form>
            </div>
        </section>
        <section class="content-panel">
            <h4><i class="fa fa-angle-right"></i> Kategorijos redagavimas</h4>
            <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                    <thead>
                    <tr>
                        <th class="numeric">#</th>
                        <th>Pavadinimas</th>
                        <th>Veiksmas</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Categories::all() as $cat)
                        <tr>
                            <td>{{$cat->id}}</td>
                            <td>{{$cat->category}}</td>
                            <td>
                                <a href="/admin/categories/edit/{{$cat->id}}">Redaguoti</a>
                                <a href="/admin/categories/remove/{{$cat->id}}">Ištrinti</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </section>
    </div>
@endsection
