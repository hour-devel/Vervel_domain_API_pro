<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Battambang&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hanuman&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lugrasimo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hanuman&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('home/css/home.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/product.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/developer.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
    {{-- captcha --}}
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=reCAPTCHA_site_key"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=API_KEY"></script>
</head>
<body>
    {{-- bar --}}
    @include('home.component.bar')

    @yield('content')

    {{-- footer --}}
    @include('home.component.footer')
</body>
<script src="{{asset('home/js/home.js')}}"></script>
@yield('script')
</html>