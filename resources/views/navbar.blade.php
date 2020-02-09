<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <!--<li class="nav-item active">
                <a class="nav-link" href="#">Sportas</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Pratimai
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Mityba</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Kardio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Parduotuvė</a>
            </li>-->
            <?php
            $navbar = Helper::getNavbar();
            ?>
            @foreach($navbar as $nav)
                @if(!$nav->havechilds)
                    @if($nav->parent == 0)
                        <li class="nav-item">
                            <a class="nav-link" href="{{$nav->link}}">{{$nav->title}}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{$nav->link}}" id="{{$nav->title}}" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{$nav->title}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="{{$nav->title}}">
                            @foreach(Helper::getNavChilds($nav->id) as $child)
                                <a class="dropdown-item" href="{{$child->link}}">{{$child->title}}</a>
                            @endforeach
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</nav>
