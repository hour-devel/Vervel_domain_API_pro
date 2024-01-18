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
                <a href="{{$url = url()->full()."&sreen=full";}}"style="color: #454D55"><i class="fa-solid fa-maximize max"></i></a>
                <a href="{{$url = url()->full()."&sreen=exit";}}" style="color: #454D55"><i class="fa-solid fa-minimize min"></i></a>
            @endforeach
        @endif
    </div>
    @if((collect(request()->query())->only('mode'))->isNotEmpty())
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
    @else
        <p style="display: none"> 
            {{$back_color=''}}
            {{$color=''}}
            {{$mode=''}}
        </p>
    @endif
    <div class="contain" style="background-color:{{$back_color}}">
        <h1 style="color:{{$color}}">
            Dashboard
        </h1>
        <div class="row">
            <div class="col-xl-3">
                <a href="{{route('User.index',['mode'=>$mode])}}" style="color:black;text-decoration:none">
                    <div class="box" style="background-color: #40E0D0">
                        <h1>User</h1>
                        <i class="fa-solid fa-users"></i>
                        <div class="footer" style="background-color: #29b5a7">
                            More info
                            <i class="fa-solid fa-circle-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3">
                <a href="{{route('Layout.index',['mode'=>$mode])}}" style="color:black;text-decoration:none">
                   <div class="box"  style="background-color: #DC3545">
                       <h1>Layout</h1>
                       <i class="fa-solid fa-table-list"></i>
                       <div class="footer" style="background-color: #C6303E">
                           More info
                           <i class="fa-solid fa-circle-arrow-right"></i>
                       </div>
                   </div>
               </a>
            </div>
            <div class="col-xl-3">
                 <a href="{{route('Category.index',['mode'=>$mode])}}" style="color:black;text-decoration:none">
                    <div class="box"  style="background-color: #FFC107">
                        <h1>Category</h1>
                        <i class="fa-solid fa-list"></i>
                        <div class="footer" style="background-color: #E5AD06">
                            More info
                            <i class="fa-solid fa-circle-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3">
                 <a href="{{route('Product.index',['mode'=>$mode])}}" style="color:black;text-decoration:none">
                    <div class="box"  style="background-color: #28A745">
                        <h1>Product</h1>
                        <i class="fa-solid fa-table-list"></i>
                        <div class="footer" style="background-color: #24963E">
                            More info
                            <i class="fa-solid fa-circle-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row" style="margin-top: 15px">
            <div class="col-xl-3">
                <a href="{{route('Customer.index',['mode'=>$mode])}}" style="color:black;text-decoration:none">
                   <div class="box"  style="background-color: #00BFFF">
                       <h1>Customer</h1>
                       <i class="fa-solid fa-user-plus"></i>
                       <div class="footer" style="background-color: #019ed2">
                           More info
                           <i class="fa-solid fa-circle-arrow-right"></i>
                       </div>
                   </div>
               </a>
           </div>
            <div class="col-xl-3">
                <a href="{{route('Import.index',['mode'=>$mode])}}" style="color:black;text-decoration:none">
                    <div class="box" style="background-color: #7B68EE">
                        <h1>Import</h1>
                        <i class="fa-solid fa-arrows-down-to-line"></i>
                        <div class="footer" style="background-color: #6F5CC4">
                            More info
                            <i class="fa-solid fa-circle-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3">
                 <a href="{{route('import_detail',['mode'=>$mode])}}" style="color:black;text-decoration:none">
                    <div class="box"  style="background-color: #FF1493">
                        <h1>Import_Detail</h1>
                        <div class="footer" style="background-color: #d51079">
                            More info
                            <i class="fa-solid fa-circle-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3">
                 <a href="" style="color:black;text-decoration:none">
                    <div class="box"  style="background-color: #E67E27">
                        <h1>Export</h1>
                        <i class="fa-solid fa-arrows-up-to-line"></i>
                        <div class="footer" style="background-color: #ca6e23">
                            More info
                            <i class="fa-solid fa-circle-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="todo-list">
                    <div class="top">
                        <h2><i class="fa-solid fa-clipboard-list"></i> To Do List</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('ToDo-List.store')}}" method="POST">
                            @csrf
                            <ul>
                                {{-- import from js --}}
                            </ul>
                        </form>
                    </div>
                    <div class="bottom">
                        <button type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Item</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
