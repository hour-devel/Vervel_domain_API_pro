@extends('home.layout.app');

@section('title','Home-Page')

@section('content')
    {{-- slide --}}
    @include('home.component.big-slide')
    {{-- cate slide --}}
    @include('home.component.cate-slide')
    {{-- product-container --}}
    @include('home.component.product')
    {{-- video --}}
    @include('home.component.mouse')
    {{-- knoledge --}}
    @include('home.component.keycap')
    {{-- contact-us --}}
    @include('home.component.contact-us')
@endsection

@section('script')
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
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
                slidesPerView: 4,
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
                slidesPerView: 6.5,
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
                slidesPerView: 5.5,
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
                slidesPerView: 4.5,
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
                slidesPerView: 3.5,
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