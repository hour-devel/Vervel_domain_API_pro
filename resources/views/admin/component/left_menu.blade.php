<div class="left-menu">
    <div class="bar">
        <div class="img">
            <img src="{{asset('admin/css/AdminLogo.webp')}}" alt="">
        </div>
        <div class="txt">
            <i class="fa-solid fa-a" style="color: #00FF7F"></i> <p>dmin</p>
        </div>
    </div>
    <div class="container">
        <div class="devel">
            <div class="img">
                <img src="{{asset('admin/css/logo1.jpg')}}" alt="">
            </div>
            <div class="txt">
                <h1>
                    <i class="fa-solid fa-k" style="color:#00FF7F"></i>
                    <i class="fa-solid fa-e" style="color:#E67E22"></i>
                    <i class="fa-solid fa-y" style="color:#00BFFF"></i>
                    <i class="fa-solid fa-c" style="color:#DC3545"></i>
                    <i class="fa-solid fa-h" style="color:#40E0D0"></i>
                    <i class="fa-solid fa-r" style="color:#7B68EE"></i>
                    <i class="fa-solid fa-o" style="color:#FFC107"></i>
                    <i class="fa-solid fa-n" style="color:#FF1493"></i>
                </h1>
            </div>
        </div>
        <div class="option">
            <ul><p style="display: none">   {{$screen='exit'}}</p>
                @if((collect(request()->query())->only('mode'))->isNotEmpty()) 
                    @foreach (collect(request()->query())->only('mode') as $key => $val)
                        <input type="hidden" name="{{$key}}" value="{{$val}}">
                        @if($val=='dm_on')
                            <p style="display: none">   {{$mode='dm_off'}}</p>
                            @if(request()->get('limite'))
                                <p style="display: none">
                                    {{$limite=request()->get('limite')}}
                                    {{$url = Request::url()."?mode=$mode&limite=$limite";}}
                                </p>
                            @else 
                                <p style="display: none">
                                    {{$url = Request::url()."?mode=$mode"}}
                                </p>
                            @endif
                            <li id="check-box">
                                <a href="{{$url}}">
                                    <i class="fa-regular check fa-square-check" id="check-box"></i>
                                    <label>Dark Mode</label>
                                </a>
                            </li>
                        @else
                            @if($val=='dm_off')
                                <p style="display: none">  {{$mode='dm_on'}} </p>
                                @if(request()->get('limite'))
                                    <p style="display: none">
                                        {{$limite=request()->get('limite')}}
                                        {{$url = Request::url()."?mode=$mode&limite=$limite";}}
                                    </p>
                                @else 
                                    <p style="display: none">
                                        {{$url = Request::url()."?mode=$mode"}}
                                    </p>
                                @endif
                                <li id="check-box">
                                    <a href="{{$url}}">
                                        <i class="fa-regular check fa-square" id="check-box"></i>
                                        <label>Dark Mode</label>
                                    </a>
                                </li>
                            @endif
                        @endif
                    @endforeach
                    @foreach (collect(request()->query())->only('mode') as $key => $val)
                        <input type="hidden" name="{{$key}}" value="{{$val}}">
                        @if($val=='dm_on')
                            <p style="display: none">   {{$mode='dm_on'}}</p>
                            <li id="dashboard">
                                <a href="{{route('dashboard',['mode'=>$mode])}}">
                                    <i class="fa-solid fa-indent"></i>
                                    <label>Dash board</label>
                                </a>
                            </li>
                            <li id="calender">
                                <a href="{{route('calender',['mode'=>$mode])}}">
                                    <i class="fa-regular fa-calendar-days"></i>
                                    <label>Calender</label>
                                </a>
                            </li>
                            <li id='report'>
                                <a>
                                    <i class="fa-solid fa-chart-pie"></i>
                                    <label>Report</label>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <i class="fa-solid fa-k" style="color:#00FF7F"></i>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <i class="fa-solid fa-e" style="color:#E67E22"></i>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <i class="fa-solid fa-y" style="color:#00BFFF"></i>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <i class="fa-solid fa-c" style="color:#DC3545"></i>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <i class="fa-solid fa-h" style="color:#40E0D0"></i>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <i class="fa-solid fa-r" style="color:#7B68EE"></i>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <i class="fa-solid fa-o" style="color:#FFC107"></i>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <i class="fa-solid fa-n" style="color:#FF1493"></i>
                                </a>
                            </li>
                        @else
                            @if($val=='dm_off')
                                <p style="display: none">  {{$mode='dm_off'}} </p>
                                <li id="dashboard">
                                    <a href="{{route('dashboard',['mode'=>$mode])}}">
                                        <i class="fa-solid fa-indent"></i>
                                        <label>Dash board</label>
                                    </a>
                                </li>
                                <li id="calender">
                                    <a href="{{route('calender',['mode'=>$mode])}}">
                                        <i class="fa-regular fa-calendar-days"></i>
                                        <label>Calender</label>
                                    </a>
                                </li>
                                <li id='report'>
                                    <a>
                                        <i class="fa-solid fa-chart-pie"></i>
                                        <label>Report</label>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <i class="fa-solid fa-k" style="color:#00FF7F"></i>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <i class="fa-solid fa-e" style="color:#E67E22"></i>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <i class="fa-solid fa-y" style="color:#00BFFF"></i>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <i class="fa-solid fa-c" style="color:#DC3545"></i>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <i class="fa-solid fa-h" style="color:#40E0D0"></i>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <i class="fa-solid fa-r" style="color:#7B68EE"></i>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <i class="fa-solid fa-o" style="color:#FFC107"></i>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <i class="fa-solid fa-n" style="color:#FF1493"></i>
                                    </a>
                                </li>
                            @endif
                        @endif
                    @endforeach
                @else
                    <li id="check-box">
                        <a href="{{
                            $url = Request::url()."?mode=dm_on";
                        }}">
                            <i class="fa-regular check fa-square" id="check-box"></i>
                            <label>Dark Mode</label>
                        </a>
                    </li>
                    <li id="dashboard">
                        <a href="{{route('dashboard',['mode'=>'dm_on'])}}">
                            <i class="fa-solid fa-indent"></i>
                            <label>Dash board</label>
                        </a>
                    </li>
                    <li id="calender">
                        <a href="{{route('calender',['mode'=>'dm_on'])}}">
                            <i class="fa-regular fa-calendar-days"></i>
                            <label>Calender</label>
                        </a>
                    </li>
                    <li id='report'>
                        <a>
                            <i class="fa-solid fa-chart-pie"></i>
                            <label>Report</label>
                        </a>
                    </li>
                    <li>
                        <a>
                            <i class="fa-solid fa-k" style="color:#00FF7F"></i>
                        </a>
                    </li>
                    <li>
                        <a>
                            <i class="fa-solid fa-e" style="color:#E67E22"></i>
                        </a>
                    </li>
                    <li>
                        <a>
                            <i class="fa-solid fa-y" style="color:#00BFFF"></i>
                        </a>
                    </li>
                    <li>
                        <a>
                            <i class="fa-solid fa-c" style="color:#DC3545"></i>
                        </a>
                    </li>
                    <li>
                        <a>
                            <i class="fa-solid fa-h" style="color:#40E0D0"></i>
                        </a>
                    </li>
                    <li>
                        <a>
                            <i class="fa-solid fa-r" style="color:#7B68EE"></i>
                        </a>
                    </li>
                    <li>
                        <a>
                            <i class="fa-solid fa-o" style="color:#FFC107"></i>
                        </a>
                    </li>
                    <li>
                        <a>
                            <i class="fa-solid fa-n" style="color:#FF1493"></i>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>