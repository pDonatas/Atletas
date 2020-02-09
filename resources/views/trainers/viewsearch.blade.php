<div class="card">
    <div class="card-header">
        @if(Auth::user()->type == 0)
            {{__('trainers.findtrainer')}}
        @elseif(Auth::user()->type == 1)
            {{__('trainers.findusers')}}
        @endif
    </div>
    <div class="card-body">
        <form method="post" action="{{route('trainers.search', app()->getLocale())}}">
            @csrf
            <div class="form-group">
                <label for="type">{{ __('page.Type') }}</label>
                <input type="text" name="type" id="type" class="form-control">
            </div>
            <div class="form-group">
                <label for="city">{{__('page.City')}}</label>
                <input id="city" type="text" name="city" class="form-control">
            </div>
            <input type="submit" class="form-control" value="{{__('page.submit')}}">
        </form>
    </div>
</div>
