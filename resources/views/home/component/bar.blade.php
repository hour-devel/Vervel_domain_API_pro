<div class="container-fluid bar1">
    <div class="container bar">
        <div class="row">
            <div class="col-xl-12 col-lg-12 menu-bar">
                <div class="menu">
                    <div class="logo-box">
                        <a href="{{route('index')}}">
                            <img src="{{asset('home/css/lg.jpg')}}" alt="">
                        </a>
                    </div>
                    <div class="menu-box">
                        <div class="box1">
                            <div class="box1-1">
                                <ul>
                                    <li class="search-box">
                                        <input type="text" name="" id="txt-search-text" placeholder="What are you looking for..">
                                        <a class="btnSearch">
                                            <i class="fas fa-search"></i>
                                        </a>
                                        <a class="btnClose">
                                            <i class="fa-solid fa-xmark"></i>
                                        </a>
                                    </li>
                                </ul>
                                <ul> 
                                    <li class="btnMenu">
                                        <a>
                                            <i class="fas fa-bars"></i>
                                            <span>Menu</span>
                                        </a>
                                    </li>
                                    @if (auth('customers')->check())
                                        <li>
                                            <a href="{{route('card')}}">
                                                <i class="fa-solid fa-cart-plus"></i>
                                                <span>
                                                    Card
                                                </span>
                                            </a>
                                        </li>
                                    @endif
                                    <li class="btn-search-box">
                                        <a>
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                            <span>Search</span>
                                        </a>
                                    </li>
                                    @if (auth('customers')->check())
                                    <li id="btn-my-toa-login">
                                        <a href="{{route('logout_customer')}}">
                                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                    @endif
                                    @if (!auth('customers')->check())
                                        <li id="btn-my-toa-login">
                                            <a href="{{route('login')}}">
                                                <i class="fa-regular fa-circle-user"></i>
                                                <span>Login</span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="box2">
                            <ul>  
                                <li class="show">
                                    <a href="{{route('product')}}">
                                        Product 
                                    </a>
                                </li>
                                <li class="show">
                                        <a href="{{route('keyboard')}}">
                                        Keyboard 
                                    </a>
                                </li>
                                <li class="show">
                                        <a href="{{route('mouse')}}">
                                        Mouse
                                    </a>
                                </li>
                                <li class="show">
                                        <a href="{{route('keycap')}}">
                                        Keycap
                                    </a>
                                </li>
                                <li class="show">
                                        <a href="{{route('contact_us')}}">
                                        Contact-Us 
                                    </a>
                                </li>
                                <li class="show">
                                        <a href="{{route('builder')}}">
                                        Bulider
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="phone-popUp"></div>
<div class="phone-menu">
    <ul>  
        <li class="logo-box">
            <a href="{{route('index')}}">
                <img src="{{asset('home/css/lg.jpg')}}" alt="">
            </a>
        </li>
        <li class="show">
            <a href="{{route('product')}}">
                Product 
            </a>
        </li>
        <li class="show">
                <a href="{{route('keyboard')}}">
                Keyboard 
            </a>
        </li>
        <li class="show">
                <a href="{{route('mouse')}}">
                Mouse
            </a>
        </li>
        <li class="show">
                <a href="{{route('keycap')}}">
                Keycap
            </a>
        </li>
        <li class="show">
                <a href="{{route('contact_us')}}">
                Contact-Us 
            </a>
        </li>
        <li class="show">
                <a href="{{route('builder')}}">
                Bulider
            </a>
        </li>
    </ul>
</div>