@extends('layouts.admin')
@section('content')
    @if(Count(Helper::getSysMessages()) > 0)
        <!-- DIRECT MESSAGE PANEL -->
        <div class="col-md-8 mb">
            @foreach(Helper::getSysMessages() as $msg)
                <div class="message-p pn">
                    <div class="message-header">
                        <h5>SISTEMINĖ ŽINUTĖ</h5>
                    </div>
                    <div class="row">
                        <div class="col-md-3 centered hidden-sm hidden-xs">
                            <img src="/img/user.png" class="img-circle" width="65">
                        </div>
                        <div class="col-md-9">
                            <p>
                                <name>Sistema</name>
                            </p>
                            <p class="small">{{$msg->created_at}}</p>
                            <p class="message">{{$msg->text}}</p>
                        </div>
                    </div>
                </div>
        @endforeach
        <!-- /Message Panel-->
        </div>
        <!-- /col-md-8  -->
    @endif
@endsection
