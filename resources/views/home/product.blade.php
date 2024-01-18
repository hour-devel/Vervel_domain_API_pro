@extends('home.layout.app')

@section('title','Product')

@section('content')

<div class="container-fluid">
    <div class="container product-con">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12 filter">
                <div class="filter-box" id="cate">
                    <h1>CATEGORY</h1>
                    <ul>
                        {{-- import from js --}}
                    </ul>
                </div>
                <div class="filter-box" id="layout">
                    <h1>LAYOUT</h1>
                    <ul>
                        {{-- import from js --}}
                    </ul>
                </div>
            </div>
            <div class="phone-popUp"></div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 product">
                <div class="product-box">
                    <div class="img-box">
                        <img src="{{asset('home/css/slide.webp')}}" alt="">
                    </div>
                    <div class="title-box">
                        <h1>OUR PRODUCT</h1>
                        <div class="btn-filter">
                            <i class="fa-solid fa-filter"></i> Fillter
                        </div>
                    </div>
                    <div class="container pro-container">
                        <div class="row" id="product">
                            {{-- import from js --}}
                        </div>
                    </div>
                </div>
                <div class="view-more">
                    <div class="box">
                        <p>View-more <br> <i class="fa-solid fa-angle-down"></i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        var body=$("body");
        fetch_api();
        async function fetch_api(){
            var limit =18;
            var lay='';
            var cate='';
            var url = "http://localhost:8000/API/Web/Product";
            var rp = await fetch(url);
            var rs = await rp.json();
            var cate_box='';
            var lay_box='';
            var pro_box='';
            var cate_container = body.find(".product-con .filter #cate ul");
            var lay_container = body.find(".product-con .filter #layout ul");
            var pro_container = body.find(".product-con .product .pro-container #product");

            rs.categories.forEach((e)=>{
                cate_box += `
                    <li data-id="${e.id}">
                        <a> 
                            ${e.name}
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </li>
                `;
            });
            cate_container.append(cate_box);

            rs.layouts.forEach((e)=>{
                lay_box += `
                    <li data-id="${e.id}">
                        <a><i class="fa-regular check fa-square"></i>${e.name}</a>
                    </li>
                `;
            });
            lay_container.append(lay_box);

            rs.products.forEach((e)=>{
                pro_box += `
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 box">
                        <div class="pro-box">
                            <a>
                                <div class="box-img">
                                    <img src="http://localhost:8000/storage/${e.product__images}" alt="">
                                    <span class="pcode"> Code: </span>
                                </div>
                                <div class="box-txt">
                                    <h1>${e.name}</h1>
                                    <h2>Price : ${e.price}</h2>
                                </div>
                            </a>
                            <div class="shop" style="z-index:168"><i class="fa-solid fa-cart-plus"></i></div>
                            <div class="fb" style="z-index:168"><i class="fa-brands fa-square-facebook"></i></div>
                            <div class="link-cp" style="z-index:168"><i class="fa-solid fa-link"></i></div>
                        </div>
                    </div>
                `;
            });
            pro_container.append(pro_box);
            //filter category
            body.find(".filter .filter-box#cate ul li").click(function(){
                var eThis = $(this);
                cate = eThis.data("id");
                var txt = '';
                $.ajax({
                    url : `http://localhost:8000/API/Web/Product/${cate}/${lay}`,
                    type:'GET',
                    success:function(data){   
                        data.products.forEach((e)=>{
                            txt += `
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 box">
                                    <div class="pro-box">
                                        <a>
                                            <div class="box-img">
                                                <img src="http://localhost:8000/storage/${e.product__images}" alt="">
                                                <span class="pcode"> Code: </span>
                                            </div>
                                            <div class="box-txt">
                                                <h1>${e.name}</h1>
                                                <h2>Price : ${e.price}</h2>
                                            </div>
                                        </a>
                                        <div class="shop" style="z-index:168"><i class="fa-solid fa-cart-plus"></i></div>
                                        <div class="fb" style="z-index:168"><i class="fa-brands fa-square-facebook"></i></div>
                                        <div class="link-cp" style="z-index:168"><i class="fa-solid fa-link"></i></div>
                                    </div>
                                </div>
                            `;
                        });
                        pro_container.html(txt);
                    }				
                }); 
                eThis.addClass("active").siblings().removeClass("active");
            });
            //filter layout
            body.find(".filter .filter-box#layout ul li").click(function(){
                if(cate == ''){
                    cate = 0;
                }
                var eThis=$(this);
                var txt = '';
                lay = eThis.data("id");
                if(eThis.find(".fa-square-check").length>0){
                    eThis.find("i").addClass("fa-square");
                    eThis.find("i").removeClass("fa-square-check");
                }else if(eThis.find(".fa-square-check").length==0){
                    $.ajax({
                        url : `http://localhost:8000/API/Web/Product/${cate}/${lay}`,
                        type:'GET',
                        success:function(data){   
                            data.products.forEach((e)=>{
                                txt += `
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 box">
                                        <div class="pro-box">
                                            <a>
                                                <div class="box-img">
                                                    <img src="http://localhost:8000/storage/${e.product__images}" alt="">
                                                    <span class="pcode"> Code: </span>
                                                </div>
                                                <div class="box-txt">
                                                    <h1>${e.name}</h1>
                                                    <h2>Price : ${e.price}</h2>
                                                </div>
                                            </a>
                                            <div class="shop" style="z-index:168"><i class="fa-solid fa-cart-plus"></i></div>
                                            <div class="fb" style="z-index:168"><i class="fa-brands fa-square-facebook"></i></div>
                                            <div class="link-cp" style="z-index:168"><i class="fa-solid fa-link"></i></div>
                                        </div>
                                    </div>
                                `;
                            });
                        pro_container.html(txt);
                        }				
                    }); 
                    eThis.find("i").addClass("fa-square-check");
                    eThis.find("i").removeClass("fa-square");
                }
            });
            // view more
            body.find(".product-con .product .view-more .box").click(function(){
                if(cate=='' && lay==''){
                    cate = 0;
                    lay = 0;
                }else if(lay==''){
                    lay=0;
                }else if(cate){
                    cate=0;
                }
                limite = limit + 9;
                var txt = '';
                $.ajax({
                    url : `http://localhost:8000/API/Web/Product/${cate}/${lay}/${limit}`,
                    type:'GET',
                    success:function(data){   
                        data.products.forEach((e)=>{
                            txt += `
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 box">
                                    <div class="pro-box">
                                        <a>
                                            <div class="box-img">
                                                <img src="http://localhost:8000/storage/${e.product__images}" alt="">
                                                <span class="pcode"> Code: </span>
                                            </div>
                                            <div class="box-txt">
                                                <h1>${e.name}</h1>
                                                <h2>Price : ${e.price}</h2>
                                            </div>
                                        </a>
                                        <div class="shop" style="z-index:168"><i class="fa-solid fa-cart-plus"></i></div>
                                        <div class="fb" style="z-index:168"><i class="fa-brands fa-square-facebook"></i></div>
                                        <div class="link-cp" style="z-index:168"><i class="fa-solid fa-link"></i></div>
                                    </div>
                                </div>
                            `;
                        });
                        pro_container.append(txt);
                    }				
                }); 
            });
        }
    });
</script>
@endsection