@extends('admin.layout.app')

@section('title','Admin')

@section('content')
<div class="bar">
    <p>
        <i class="fa-solid fa-bars"></i>
    </p>
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
                {{$color='#eee'}}
                {{$th_color='#fff'}}
                {{$td_color='#00FF7F'}}
                {{$label_color='#fff'}}
                {{$input_border='#00FF7F'}}
            </p>
        @else
            @if($val=='dm_off')
            <p style="display: none">
                {{$back_color='#eee'}} 
                {{$table_color='#fff'}}
                {{$color='#454D55'}} 
                {{$th_color='#aaa'}}
                {{$td_color='navy'}}
                {{$label_color='#666'}}
                {{$input_border='#6F5CC4'}}
            </p>
            @endif
        @endif
    @endforeach
    @else
    <p style="display: none"> 
        {{$back_color=''}}
        {{$table_color=''}}
        {{$color=''}}
        {{$th_color=''}}
        {{$td_color=''}}
        {{$label_color=''}}
        {{$input_border=''}}
    </p>
@endif
<div class="tab" style="background-color:{{$back_color}}">
    <div class="form" style="background-color: {{$table_color}}">
        <form action="{{route('User.update',['User'=>$user->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">First-Name</label>
                    </div>
                    <div class="box">
                        <input type="text" name="first_name" value="{{$user->first_name}}"
                        class="form-control" placeholder="Your First Name" style="border:2px solid {{$input_border}}">
                    </div>
                </div>
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Last-Name</label>
                    </div>
                    <div class="box">
                        <input type="text" name="last_name" value="{{$user->last_name}}"
                        class="form-control" placeholder="Your Last Name" style="border:2px solid {{$input_border}}">
                    </div>
                </div>
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Gender</label>
                    </div>
                    <div class="box">
                        <select name="gender" class="form-select" style="border:2px solid {{$input_border}}">
                            <option value="{{$user->gender}}">{{$user->gender}}</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Email</label>
                    </div>
                    <div class="box">
                        <input type="text" name="email" value="{{$user->email}}"
                        class="form-control" placeholder="Your First Name" style="border:2px solid {{$input_border}}">
                    </div>
                </div>
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Password</label>
                    </div>
                    <div class="box">
                        <input type="text" name="password" value="{{$user->pass}}"
                        class="form-control" placeholder="Your Last Name" style="border:2px solid {{$input_border}}">
                    </div>
                </div>
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Role</label>
                    </div>
                    <div class="box">
                        <select name="role_id" class="form-select" style="border:2px solid {{$input_border}}">
                            <option value="{{$user->role_id}}">{{$user->role_id}}</option>
                            <option value="1">Admin</option>
                            <option value="2">Design</option>
                            <option value="3">Developer</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Birthdate</label>
                    </div>
                    <div class="box">
                        <input type="text" name="birthdate" value="{{$user->birthdate}}"
                        class="form-control" placeholder="Your Birthdate" style="border:2px solid {{$input_border}}">
                    </div>
                </div>
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Phone-Number</label>
                    </div>
                    <div class="box">
                        <input type="text" name="phone_num" value="{{$user->phone_num}}"
                        class="form-control" placeholder="Your First Name" style="border:2px solid {{$input_border}}">
                    </div>
                </div>
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Address</label>
                    </div>
                    <div class="box">
                        <input type="text" name="address" value="{{$user->address}}"
                        class="form-control" placeholder="Your First Name" style="border:2px solid {{$input_border}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Photo</label>
                    </div>
                    <div class="box">
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" placeholder="photo" id='photo' name='photo' style="border:2px solid {{$input_border}}">
                        @error('photo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="column"></div>
                <div class="column"></div>
            </div>
            @if ($message = Session::get('success'))
                <div class="message">
                    <p>{{$message}}</p>
                </div>
            @endif
            <div class="action">
                <a href="{{route('User.index',['mode'=>$mode])}}">
                    <button type="button" class="btn btn-danger cancel">Cancel</button>
                </a>
                <button type="submit" class="btn btn-primary add">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection