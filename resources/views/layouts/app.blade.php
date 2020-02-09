<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="line"></div>
    <header>
        <div class="row">
            <div class="col-md-3">
                <img class="logo" src="{{asset('img/logo.png')}}" alt="LOGO"/>
            </div>
            <div class="col-md-5 offset-md-4 align-self-center">
                <div class="row profile no-pad">
                    @guest()
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('login', app()->getLocale()) }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right">{{ __('auth.E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-right">{{ __('auth.Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('auth.Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('auth.Login') }}
                                        </button>

                                        <a class="btn btn-link" href="{{ route('register',app()->getLocale()) }}">
                                            {{ __('auth.Register') }}
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="col-md-2">
                            <img src="{{Auth()->user()->photo}}" alt="username"/>
                        </div>
                        <div class="col-md-10">
                            <div class="row no-pad">
                                <div class="col-md-8">
                                    <ul>
                                        <ul>
                                            <li>{{__('user.name')}}: {{Auth()->user()->name}}</li>
                                            <li>{{__('user.surname')}}: {{Auth()->user()->Surname}}</li>
                                            <li>{{__('user.type')}}:
                                                @if(Auth()->user()->type == 1)
                                                    Treneris
                                                @else
                                                    Vartotojas
                                                @endif
                                            </li>
                                        </ul>
                                    </ul>
                                </div>
                                <div class="col-md-4 align-self-center">
                                    <form method="post" action="{{route('logout', app()->getLocale())}}">
                                        @csrf
                                        <input type="submit" class="btn" value="Atsijungti">
                                    </form>
                                </div>
                            </div>

                            <!--<hr>
                            <ul class="list-group">
                                <li class="list-group-item"><a href="#">Mano straipsniai</a></li>
                                <li class="list-group-item"><a href="#">Mano treniruočių programos</a></li>
                                <li class="list-group-item"><a href="#">Mano treniruojami žmonės</a></li>
                            </ul>-->
                        </div>
                    @endguest
                </div>
            </div>
        </div>
        @include('navbar')
    </header>
    <div class="top-content">
        <div class="row">
            @include('news.big', ['data'=>Helper::feature()])
        </div>
    </div>
    <!-- Main -->
    <div class="main-page">
        <div class="row">
            <div class="col-md-8">
                @yield('content')
            </div>
            <!-- Sidebar -->
            <div class="col-md-4">
                @auth
                    <div class="card">
                        <div class="card-header">Vartotojo valdymas</div>
                        <div class="card-body">
                            <div class="profile-big text-center">
                                <img src="{{Auth()->user()->photo}}" alt=""/>
                                <ul class="list-group">
                                    <li class="list-group-item"><a
                                            href="{{route('user.edit', app()->getLocale())}}">{{__('user.profile_edit')}}</a>
                                    </li>
                                    @if(Auth::user()->type == 1)
                                        <li class="list-group-item"><a
                                                href="{{route('user.write', app()->getLocale())}}">{{__('user.writearticle')}}</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                @endauth
                @if(count(Helper::getAllTrainers()) > 0)
                    <div class="card">
                        <div class="card-header">{{__('trainers.new_trainers')}}</div>
                        <div class="card-body">
                            <div id="treneriai" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <?php $i = 0;
                                    $trainers = Helper::getAllTrainers();
                                    ?>
                                    @foreach($trainers as $train)
                                        <li data-target="#treneriai" data-slide-to="{{$i}}"
                                            @if($i == 0) class="active" @endif></li>
                                        <?php $i++; ?>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    <?php $i = 0; ?>
                                    @foreach($trainers as $train)
                                        <div class="carousel-item @if($i == 0) active @endif">
                                            <img class="d-block w-100" src="{{$train->photo}}" alt="{{$train->name}}">
                                            <div class="carousel-caption d-none d-md-block">
                                                <a href="/user/{{$train->id}}">{{$train->name}}</a>
                                            </div>
                                        </div>
                                        <?php $i++; ?>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#treneriai" role="button"
                                   data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#treneriai" role="button"
                                   data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <!-- End Sidebar -->
        </div>
    </div>
    <!-- End main -->
</div>
</body>
</html>
