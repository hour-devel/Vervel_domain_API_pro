@extends('home.layout.app')

@section('title','Developer')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding: 0">
            <div class="develper-container">
                <div class="photo">
                    <img src="{{asset('home/css/b2.jpg')}}" alt="">
                </div>
                <div class="txt">
                    <h1>Ny Lihour</h1>
                    <h2>Web Developer</h2>
                    <p>" ធម្មតាគឺគួរអោយធុញ - Normal Is Boring"</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding: 0">
            <div class="knowledge-container">
                <h1>Knowledge</h1>
                <ul>
                    <li>
                        <a href="">
                            HTML <br>
                            <img src="{{asset('home/css/html.png')}}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            CSS<br>
                            <img src="{{asset('home/css/css.png')}}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            BOOTSTRAP<br>
                            <img src="{{asset('home/css/bootstrap.png')}}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            JAVASCRIPT<br>
                            <img src="{{asset('home/css/js.png')}}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            JQUERY<br>
                            <img src="{{asset('home/css/jquery.png')}}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            MYSQL<br>
                            <img src="{{asset('home/css/mysql.png')}}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            SQL<br>
                            <img src="{{asset('home/css/sql.png')}}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            PHP<br>
                            <img src="{{asset('home/css/php.png')}}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            LARAVEL<br>
                            <img src="{{asset('home/css/lara.png')}}" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding: 0">
            <div class="Experience-container">
                <h1>Work Experiences</h1>
                <ul>
                    <li>
                        <a href="">Website</a>
                    </li>
                    <li>
                        <a href="">Mini Mart System</a>
                    </li>
                    <li>
                        <a href="">Coffee System</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

 <div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding: 0">
            <div class="education-container">
                <h1>Education Background</h1>
                <ul>
                    <li>
                        <a href="">	
                            2021-Now : Study at collage Department Computer Science Year3 at RUPP	
                        </a>
                    </li>
                    <li>
                        <a href="">
                            2015-2021 : Hun Sen Treuysla High School Certificate (BacII)
                        </a>
                    </li>
                    <li>
                        <a href="">
                            May-2023 to Now : Learn and research framework Laravel
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Jan-2023 to Now : Study English at PUC
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Oct-2022 to Dec-2022 : Studied Website Development (PHP, MySQL) at Rean Web School
                        </a>
                    </li>
                    <li>
                        <a href="">
                            June-2022 to Sep-2022 : Studied Website Design (HTML, CSS, JavaScript) and jQuery at Rean Web School
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding: 0">
            <div class="contact-container">
                <h1>Contact</h1>
                <ul>
                    <li>
                        <a href="https://web.facebook.com/profile.php?id=100077355072497" style="color:#089CF4">	
                            <i class="fa-brands fa-square-facebook"></i> Facebook 
                        </a>
                    </li>
                    <li>
                        <a href=" https://www.instagram.com/iamnylihour/" style="color: #FF0477">
                            <i class="fa-brands fa-instagram"></i> Instagram 
                        </a>
                    </li>
                    <li>
                        <a href="" style="color: #28A4E3">
                            <i class="fa-brands fa-telegram"></i> Telegram 
                        </a>
                    </li>
                    <li>
                        <a href="" style="color: #1C61EA">
                            <i class="fa-regular fa-envelope"></i> Email : nylihour001@gmail.com
                        </a>
                    </li>
                    <li>
                        <a href="" style="color: #48E361">
                            <i class="fa-solid fa-square-phone"></i> Phone : 086 335 346
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

