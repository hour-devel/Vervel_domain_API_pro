@extends('admin.layout.app')

@section('title','Admin')

@section('content')
<div class="bar">
    {{-- <p>
        <i class="fa-solid fa-bars"></i>
    </p> --}}
    <div class="slide">
        <p>
            <i class="fa-solid fa-k" style="color:#00FF7F"></i>
            <i class="fa-solid fa-e" style="color:#E67E22"></i>
            <i class="fa-solid fa-y" style="color:#00BFFF"></i>
            <i class="fa-solid fa-c" style="color:#DC3545"></i>
            <i class="fa-solid fa-h" style="color:#40E0D0"></i>
            <i class="fa-solid fa-r" style="color:#7B68EE"></i>
            <i class="fa-solid fa-o" style="color:#FFC107"></i>
            <i class="fa-solid fa-n" style="color:#FF1493"></i>
        </p>
    </div>
    <i class="fa-regular fa-comments"></i>
    <i class="fa-regular fa-bell"></i>
    @if((collect(request()->query())->only('mode'))->isNotEmpty())
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
            <a href="{{$url = url()->full()."&screen=full";}}" style="color: #454D55"><i class="fa-solid fa-maximize max"></i></a>
            <a href="{{$url = url()->full()."&screen=exit";}}" style="color: #454D55"><i class="fa-solid fa-minimize min"></i></a>
        @endforeach
    @endif
</div>
@if((collect(request()->query())->only('mode'))->isNotEmpty())
    @foreach (collect(request()->query())->only('mode') as $key => $val)
        <input type="hidden" name="{{$key}}" value="{{$val}}">
        @if($val=='dm_on')
            <p style="display: none"> 
                {{$back_color='#454D55'}}
                {{$table_color='#343A40'}}
                {{$list='#343A40'}}
                {{$color='#eee'}}
                {{$th_color='#fff'}}
                {{$td_color='#00FF7F'}}
            </p>
        @else
            @if($val=='dm_off')
            <p style="display: none">
                {{$back_color='#eee'}} 
                {{$table_color='#fff'}}
                {{$list='#fff'}}
                {{$color='#454D55'}} 
                {{$th_color='#aaa'}}
                {{$td_color='navy'}}
            </p>
            @endif
        @endif
    @endforeach
    @else
    <p style="display: none"> 
        {{$back_color=''}}
        {{$table_color=''}}
        {{$list=''}}
        {{$color=''}}
        {{$th_color=''}}
        {{$td_color=''}}
    </p>
@endif
<div class="tab" style="background-color:{{$back_color}}">
    <div class="top">
        <div class="path">
            <h2><span></span> Categories</h2>
        </div>
        <form action="{{route('Category.index')}}">
            <div class="search">
                <div class="box">
                    <input type="text" name="search" id="search" class="form-control">
                    <select id="filter" name="filter" class="form-select">
                        <option value="">Filter</option>
                        <option {{ request()->get('filter') == "name" ? "selected" : "" }} value="name">Name</option>
                        <option {{ request()->get('filter') == "user" ? "selected" : "" }} value="user">User</option>
                    </select>
                </div>
            </div>
            @foreach (collect(request()->query())->only(['mode','limite']) as $key => $val)
                <input type="hidden" name={{$key}} value="{{$val}}">
            @endforeach
        </form>
        <div class="add">
            <p><span></span><a href="{{route('Category.create',['mode'=>$mode])}}" style="color: #fff;text-decoration:none">Add new</a></p>
        </div>
    </div>
    <div class="list" style="background-color: {{$list}}">
        <table style="background-color: {{$table_color}}">
            <tr>
                <th style="color:{{$th_color}}" width="80px">ID</th>
                <th style="color:{{$th_color}}">User</th>
                <th style="color:{{$th_color}}">Name</th>
                <th style="color:{{$th_color}}">Color</th>
                <th style="color:{{$th_color}}" width="100px">Status</th>
                <th style="color:{{$th_color}}" width="300px">Created-at</th>
                <th style="color:{{$th_color}}" width="80px">Action</th>
            </tr>
            @foreach ($categories as $category)
                <tr>
                    <td style="color:{{$td_color}}">{{$category->id}}</td>
                    <td style="color:{{$td_color}}">{{$category->user->first_name."-".$category->user->last_name}}</td>
                    <td style="color:{{$td_color}}">{{$category->name}}</td>
                    <td style="color:{{$td_color}}">
                        <div class="color" style="background-color: {{$category->color}}"></div>
                    </td>
                    <td style="color:{{$td_color}}">{{$category->status}}</td>
                    <td style="color:{{$td_color}}">{{$category->created_at}}</td>
                    <td style="color:{{$td_color}}">
                        <a href="{{route('Category.show',['Category'=>$category->id,'mode'=>$mode])}}" style="color:{{$td_color}}">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="bottom">
        <div class="box">
            <div class="show">
                <div class="txt">
                    <p>Rows per page</p>
                </div>
                @if(request()->get('limite'))
                    <div class="select">
                        <select name="" id="" class="form-select" onchange="window.location.href=this.options[this.selectedIndex].value;">
                            <option {{ request()->get('limite') == 10 ? "selected" : "" }} value="{{route('Category.index',['mode'=>$mode,'limite'=>10])}}">10</option>
                            <option {{ request()->get('limite') == 20 ? "selected" : "" }} value="{{route('Category.index',['mode'=>$mode,'limite'=>20])}}">20</option>
                            <option {{ request()->get('limite') == 100 ? "selected" : "" }} value="{{route('Category.index',['mode'=>$mode,'limite'=>100])}}">100</option>
                        </select>
                    </div>
                @else
                    <div class="select">
                        <select name="" id="" class="form-select" onchange="window.location.href=this.options[this.selectedIndex].value;">
                            <option>Limite</option>
                            <option value="{{url()->full()."&limite=10"}}">10</option>
                            <option value="{{url()->full()."&limite=20"}}">20</option>
                            <option value="{{url()->full()."&limite=100"}}">100</option>
                        </select>
                    </div>
                @endif
            </div>
            <div class="pagination">
                <div class="length-data">
                    <span class="current-page">
                        {{ $categories->currentPage() }}
                        to 
                        {{ $categories->lastPage() }}
                        of
                        {{$count}}
                    </span> 
                </div>
                <div class="action">
                    <div class="back">
                        @if ($categories->onFirstPage())
                            <span class="disabled">
                                <i class="fa-solid fa-backward-step"></i>
                            </span>
                            <span class="disabled">
                                <i class="fa-solid fa-angle-left"></i>
                            </span>
                        @else
                            <a href="{{\url()->full().'&page=1'}}">
                                <i class="fa-solid fa-backward-step"></i>
                            </a>
                            <a href="{{ $categories->previousPageUrl() }}">
                                <i class="fa-solid fa-angle-left"></i>
                            </a>
                        @endif
                    </div>
                    <div class="next">
                        @if ($categories->hasMorePages())
                            <a href="{{ $categories->nextPageUrl() }}">
                                <i class="fa-solid fa-angle-right"></i>
                            </a>
                            <a href="{{ \url()->full().'&page='.$categories->lastPage() }}">
                                <i class="fa-solid fa-forward-step"></i>
                            </a>
                        @else
                            <span class="disabled">
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                            <span class="disabled">
                                <i class="fa-solid fa-forward-step"></i>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection