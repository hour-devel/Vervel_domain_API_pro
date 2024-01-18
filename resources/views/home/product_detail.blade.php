@extends('home.layout.app')

@section('title','Product_Detail')

@section('content')

<div class="container-fluid" style="background-color:#fff">
    <div class="pro-detail-con">
        <div class="row" id="product_detail">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pro-detail-box">
                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid" style="margin-bottom:50px">
    <div class="container title">
        <div class="row">
            <div class="col-xl-12 head-title">
                <h1>Product</h1>
            </div>
        </div>
    </div>
    <div class="container product-container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 product-box">
                <div class="product">
                    <a>
                        <div class="img-box">
                            <img src="{{asset('home/css/22.webp')}}" alt="">
                            <span class="pcode"> Code: </span>
                        </div>
                        <div class="txt-box">
                            <h2>type</h2>
                            <h1>Name</h1>
                        </div>
                    </a>
                    <div class="shop"><i class="fa-solid fa-cart-plus"></i></div>
                    <div class="fb"><i class="fa-brands fa-square-facebook"></i></div>
                    <div class="link-cp"><i class="fa-solid fa-link"></i></div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 product-box">
                <div class="product">
                    <a>
                        <div class="img-box">
                            <img src="{{asset('home/css/22.webp')}}" alt="">
                            <span class="pcode"> Code: </span>
                        </div>
                        <div class="txt-box">
                            <h2>type</h2>
                            <h1>Name</h1>
                        </div>
                    </a>
                    <div class="shop"><i class="fa-solid fa-cart-plus"></i></div>
                    <div class="fb"><i class="fa-brands fa-square-facebook"></i></div>
                    <div class="link-cp"><i class="fa-solid fa-link"></i></div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 product-box">
                <div class="product">
                    <a>
                        <div class="img-box">
                            <img src="{{asset('home/css/22.webp')}}" alt="">
                            <span class="pcode"> Code: </span>
                        </div>
                        <div class="txt-box">
                            <h2>type</h2>
                            <h1>Name</h1>
                        </div>
                    </a>
                    <div class="shop"><i class="fa-solid fa-cart-plus"></i></div>
                    <div class="fb"><i class="fa-brands fa-square-facebook"></i></div>
                    <div class="link-cp"><i class="fa-solid fa-link"></i></div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 product-box">
                <div class="product">
                    <a>
                        <div class="img-box">
                            <img src="{{asset('home/css/22.webp')}}" alt="">
                            <span class="pcode"> Code: </span>
                        </div>
                        <div class="txt-box">
                            <h2>type</h2>
                            <h1>Name</h1>
                        </div>
                    </a>
                    <div class="shop"><i class="fa-solid fa-cart-plus"></i></div>
                    <div class="fb"><i class="fa-brands fa-square-facebook"></i></div>
                    <div class="link-cp"><i class="fa-solid fa-link"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 6,
        spaceBetween: 20,
        slidesPerGroup: 2,
        loop: true,
        loopFillGroupWithBlank: true,
        autoplay: {
             delay: 3000,
             disableOnInteraction: false,
        },
        // pagination: {
        //     el: ".swiper-pagination",
        //     clickable: true,
        // },
        navigation: {
            nextEl: ".next-cate",
            prevEl: ".back-cate",
        },
        breakpoints: {
            // when window width is <= 1200px
            1200: {
                slidesPerView: 6,
                spaceBetween: 20,
                slidesPerGroup: 2,
                loop: true,
                loopFillGroupWithBlank: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".next-cate",
                    prevEl: ".back-cate",
                },
            },
            // when window width is <= 992px
            992: {
                slidesPerView: 5,
                spaceBetween: 20,
                slidesPerGroup: 3,
                loop: true,
                loopFillGroupWithBlank: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".next-cate",
                    prevEl: ".back-cate",
                },
            },
            // when window width is <= 768px
            768: {
                slidesPerView: 6,
                spaceBetween: 20,
                slidesPerGroup: 3,
                loop: true,
                loopFillGroupWithBlank: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".next-cate",
                    prevEl: ".back-cate",
                },
            },
            // when window width is <= 576px
            576: {
                slidesPerView: 5,
                spaceBetween: 20,
                slidesPerGroup: 2,
                loop: true,
                loopFillGroupWithBlank: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".next-cate",
                    prevEl: ".back-cate",
                },
            },
            // when window width is <= 300px
            300: {
                slidesPerView: 4,
                spaceBetween: 20,
                slidesPerGroup: 1,
                loop: true,
                loopFillGroupWithBlank: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".next-cate",
                    prevEl: ".back-cate",
                },
            },
        },   
    });
</script>
@endsection