@extends('admin.layout.app')

@section('title','Calender')

@section('content')
    <div class="bar">
        <p>
            <i class="fa-solid fa-bars"></i>
        </p>
        <i class="fa-regular fa-comments"></i>
        <i class="fa-regular fa-bell"></i>
        @foreach (collect(request()->query())->only('mode') as $key => $val)
        <input type="hidden" name="{{$key}}" value="{{$val}}">
        @if($val=='dm_on')
            <p style="display: none">
                {{$mode='dm_on'}}
            </p>
        @else
            @if($val=='dm_off')
            <p style="display: none">
                {{$mode='dm_off'}}
            </p>
            @endif
        @endif
        <a href="{{$url = url()->full()."&sreen=full";}}"style="color: #454D55"><i class="fa-solid fa-maximize max"></i></a>
        <a href="{{$url = url()->full()."&sreen=exit";}}" style="color: #454D55"><i class="fa-solid fa-minimize min"></i></a>
    @endforeach
    </div>
    @foreach (collect(request()->query())->only('mode') as $key => $val)
        <input type="hidden" name="{{$key}}" value="{{$val}}">
            @if($val=='dm_on')
                <p style="display: none"> 
                    {{$back_color='#454D55'}}
                    {{$color='#eee'}}
                </p>
            @else
                @if($val=='dm_off')
                <p style="display: none">
                    {{$back_color='#eee'}} 
                    {{$color='#454D55'}} 
                </p>
                @endif
            @endif
    @endforeach
    <div class="contain" style="background-color: {{$back_color}}">
        <div class="container calender">
            <div class="panel panel-primary">
                <div class="panel-body" >
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
@endsection