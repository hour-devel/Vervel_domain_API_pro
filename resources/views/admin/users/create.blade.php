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
        <form action="{{route('User.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">First-Name</label>
                    </div>
                    <div class="box">
                        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" 
                        placeholder="Your First Name" style="border:2px solid {{$input_border}}">
                        @error('first_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                </div>
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Last-Name</label>
                    </div>
                    <div class="box">
                        <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" 
                        placeholder="Your Last Name" style="border:2px solid {{$input_border}}">
                        @error('last_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Gender</label>
                    </div>
                    <div class="box">
                        <select name="gender" class="form-select @error('gender') is-invalid @enderror"" style="border:2px solid {{$input_border}}">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Email</label>
                    </div>
                    <div class="box">
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" 
                        placeholder="Your First Name" style="border:2px solid {{$input_border}}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Password</label>
                    </div>
                    <div class="box">
                        <input type="text" name="password"
                        class="form-control @error('password') is-invalid @enderror" placeholder="Your Last Name" style="border:2px solid {{$input_border}}">
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Role</label>
                    </div>
                    <div class="box">
                        <select name="role_id" class="form-select  @error('role_id') is-invalid @enderror"" style="border:2px solid {{$input_border}}">
                            <option value="1">Admin</option>
                            <option value="2">Design</option>
                            <option value="3">Developer</option>
                        </select>
                        @error('role_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Birthdate</label>
                    </div>
                    <div class="box">
                        <input type="date" name="birthdate"
                        class="form-control @error('birthdate') is-invalid @enderror" placeholder="Your Birthdate" style="border:2px solid {{$input_border}}">
                        @error('birthdate')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Phone-Number</label>
                    </div>
                    <div class="box">
                        <input type="text" name="phone_num"
                        class="form-control @error('phone_num') is-invalid @enderror" placeholder="Your First Name" style="border:2px solid {{$input_border}}">
                        @error('phone_num')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Address</label>
                    </div>
                    <div class="box">
                        <input type="text" name="address"
                        class="form-control @error('address') is-invalid @enderror" placeholder="Your First Name" style="border:2px solid {{$input_border}}">
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
                <button type="submit" class="btn btn-primary add">Add new</button>
            </div>
        </form>
    </div>
</div>
@endsection