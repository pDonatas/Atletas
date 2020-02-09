@if(count($data) != 0)
    <div class="@if(count($data) > 3) col-md-8 @else col-md-12 @endif">
        <div class="feauture">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                    $i = 0;
                    ?>
                    @foreach($data as $dat)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"
                            @if($i == 0) class="active"@endif></li>
                        <?php
                        $i++;
                        ?>
                        @if($i == 3) @break @endif
                    @endforeach
                </ol>
                <?php $i = 0; ?>
                <div class="carousel-inner">
                    @foreach($data as $dat)
                        <div class="carousel-item @if($i == 0) active @endif">
                            <div class="caption"><a
                                    href="/categories/{{Helper::cat($dat->category)}}">{{Helper::cat($dat->category)}}</a>
                            </div>
                            <img class="d-block w-100 bignew" src="{{$dat->image}}" alt="Test">
                            <div class="carousel-caption d-none d-md-block">
                                <a href="/news/{{$dat->slug}}">{{$dat->title}}</a>
                            </div>
                        </div>
                        <?php
                        $i++;
                        ?>
                        @if($i == 3) @break @endif
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                   data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                   data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    @if(count($data) > 3)
        <div class="col-md-4">
            <?php
            $forth = $data[3];
            ?>
            <div class="feature">
                <div class="caption"><a
                        href="/categories/{{Helper::cat($forth->category)}}">{{Helper::cat($forth->category)}}</a></div>
                <img src="{{$forth->image}}" alt=""/>
                <div class="bottom-caption"><a href="/news/{{$forth->slug}}">{{$forth->title}}</a></div>
            </div>
            <div class="row">
                @if(count($data) > 4)
                    <?php $fifth = $data[4];?>
                    <div class="col-md-6">
                        <div class="feature">
                            <img class="feature-small" src="{{$fifth->image}}" alt=""/>
                            <div class="bottom-caption"><a href="/news/{{$fifth->slug}}">{{$fifth->title}}</a></div>
                        </div>
                    </div>
                @endif
                @if(count($data) > 5)
                    <?php $sixth = $data[5];?>
                    <div class="col-md-6">
                        <div class="feature">
                            <img class="feature-small" src="{{$sixth->image}}" alt=""/>
                            <div class="bottom-caption"><a href="/news/{{$sixth->slug}}">{{$sixth->title}}</a></div>
                        </div>
                    </div>
            </div>
            @endif
        </div>
    @endif
@endif
