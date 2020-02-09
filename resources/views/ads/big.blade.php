@if(count($data) > 0)
    <div class="card">
        <div class="card-header">
            {{__('page.Advertisement')}}
        </div>
        <div class="card-body">
            <div id="reklama" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php $i = 0; ?>
                    @foreach($data as $row)
                        <li data-target="#reklama" data-slide-to="{{$i}}" @if($i == 0) class="active" @endif></li>
                        <?php $i++; ?>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    <?php $i = 0; ?>
                    @foreach($data as $row)
                        <div class="carousel-item @if($i == 0) active @endif">
                            <a href="{{$row->url}}"><img class="d-block w-100" src="{{$row->image}}"
                                                         alt="{{$row->title}}"></a>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#reklama" role="button"
                   data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#reklama" role="button"
                   data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
@endif
