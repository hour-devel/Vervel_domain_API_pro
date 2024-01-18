$(document).ready(function(){
    $windowwidth=$(window).width();
    var popUP='<div class="popUP"></div>';
    var loading='<div class="popUP"><div class="loading-box"><div class="loading"></div></div></div>';
    let body=$("body");
    var eThis=$(this);
    var using ='';
    //small device show search box
    body.on('click','.menu .menu-box .btn-search-box',function(){
        $(".menu-bar").find(".menu .menu-box .box1 .box1-1 ul li.search-box").css({"left":"50%"});
        $(".menu-bar").find(".menu .menu-box .box1 .box1-1 ul li.search-box").css({"top":"50%"});
        $(".menu-bar").find(".menu .menu-box .box1 .box1-1 ul li.search-box").css({"transform":"translate(-50%,-50%)"});
        $(".menu-bar").find(".menu .menu-box .box1 .box1-1 ul li.search-box").css({"transition":"0.5"});
        $(".menu-bar").find(".menu .menu-box .box1 .box1-1 ul li.btnMenu").css({"display":"none"});
        $(".menu-bar").find(".menu .menu-box .box1 .box1-1 ul li.btn-search-box").css({"display":"none"});
        $(".menu-bar").find(".menu .menu-box .box1 .box1-1 ul li:not(.search-box)").css({"display":"none"});
    });
    body.on('click','.menu .menu-box .btnClose',function(){
        $(".menu-bar").find(".menu .menu-box .box1 .box1-1 ul li.search-box").css({"left":"-100%"});
        $(".menu-bar").find(".menu .menu-box .box1 .box1-1 ul li.search-box").css({"transition":"0.5"});
        $(".menu-bar").find(".menu .menu-box .box1 .box1-1 ul li.btnMenu").css({"display":"block"});
        $(".menu-bar").find(".menu .menu-box .box1 .box1-1 ul li.btn-search-box").css({"display":"block"});
        $(".menu-bar").find(".menu .menu-box .box1 .box1-1 ul li:not(.search-box)").css({"display":"block"});
    });
    //small device show menu
    body.on('click','.menu .menu-box .btnMenu',function(){
        $(".phone-popUp").css({"display":"block"});
        $(".phone-menu").css({"left":"0"});
    });    
    body.on('click','.phone-popUp',function(){
        $(".phone-popUp").css({"display":"none"});
        $(".phone-menu").css({"left":"-252px"});
        body.find(".product-con .filter").css({"left":"-252px"});
    });
    //get left menu
    body.find(".product-con .title-box .btn-filter").click(function(){
        $(".phone-popUp").css({"display":"block"});
        body.find(".product-con .filter").css({"left":"0"});
    });
    //popUp-video
    body.find(".video-container .video").click(function(){
        // var video_id = $(this).data("id");
        var txt='';
        // $.ajax({
        //     url:``,
        //     type:'POST',
        //     data:{video_id:video_id},
        //     // contentType:false,
        //     cache:false,
        //     // processData:false,
        //     dataType:"json",
        //     beforeSend:function(){
        //             //work before success    
        //     },
        //     success:function(data){   
        //         data.forEach( (e) =>{
        //             txt += `
        //                 <div class="row">           
        //                     <div class="col-xl-12 col-lg-12 img-box">
        //                         ${e.id_video}
        //                     </div>
        //                 </div>
        //             `;
        //         });
        //         body.find(".frm-video").append(txt);
        //         body.find(".video-popup").show();
        //             //work after success        
        //     }				
        // }); 

        txt += `
            <div class="row">           
                <div class="col-xl-12 col-lg-12 img-box">
                    1
                </div>
            </div>
        `;
        body.find(".frm-video").append(txt);
        body.find(".video-popup").show();
    });
    //close video popUp
    body.find(".video-popup .close").click(function(){
        body.find(".video-popup").hide();
    });

    fetch_api();
    async function fetch_api(){
        var url = "http://localhost:8000/API/Web/Index";
        var rp = await fetch(url);
        var rs = await rp.json();
        var big_slide_box='';
        var product_box='';
        var mouse_box='';
        var keycap_box='';
        var category_box='';
        var pagination='';
        var container = body.find('.product-container #product');
        var container_big_slide = body.find('.slide-container #big-slide');
        var container_category = body.find('.cate-menu-container .cate-menu #category');
        var container_mouse = body.find('.product-container #mouse');
        var container_keycap = body.find('.product-container #keycap');

        //big slide
        rs.big_slide.forEach( (e) =>{
            big_slide_box += `
                <div class="slide">
                    <div class="slide-show">
                        <div class="shadow"></div>
                        <img src="http://localhost:8000/storage/${e.poster}" alt="">
                        <div class="txt-slide">
                            <h1>${e.name.substr(0,50) + "..."}</h1>
                            <button type="button" class="btn btn-secondary slide-button">Shop now</button>
                        </div>
                    </div>
                </div>
            `; 
            pagination += `
                   <span></span>
            `;
        });
        container_big_slide.append(big_slide_box);
        $(".slide-container").find(".slide-box .pagination").html(pagination);

        // click show
        $(".slide-container").find(".slide-box .pagination span").eq(0).addClass("active");
        $(".slide-container").on('click','.slide-box .pagination span',function(){
            $(this).addClass("active").siblings().removeClass("active");
            slide.eq(indSlide).hide();
            indSlide=$(this).index();
            slide.eq(indSlide).show();
        });
        // slide
        let slide= $('.slide-show');
        let indSlide = 0;
        let numSlide = slide.length;
        slide.hide();
        slide.eq(indSlide).show();
        // next slide
        function nextslide(){
            $(".slide-container").find(".slide-box .pagination span").eq(indSlide).removeClass("active");
            slide.eq(indSlide).hide();
            indSlide ++;
            if( indSlide >= numSlide){
                indSlide = 0;
            }
            slide.eq(indSlide).show();
            $(".slide-container").find(".slide-box .pagination span").eq(indSlide).addClass("active");
        }
        var mynextslide = setInterval(
            nextslide,
            3000
        );
        // stop auto slide
        $('.slide').mouseover(function(){
            clearInterval(mynextslide);
        })
        $('.next').mouseover(function(){
            clearInterval(mynextslide);
        })
        $('.back').mouseover(function(){
            clearInterval(mynextslide);
        })
        $('.pagination').mouseover(function(){
            clearInterval(mynextslide);
        })
        // start auto slide
        $('.slide').mouseleave(function(){
            mynextslide = setInterval(
                nextslide,
                3000
            );
        })
        $('.next').click(function(){
            nextslide();
        });
        // back slide
        $('.back').click(function(){
            $(".slide-container").find(".slide-box .pagination span").eq(indSlide).removeClass("active");
            slide.eq(indSlide).hide();
            indSlide --;
            if( indSlide < 0 ){
                indSlide = numSlide-1 ;
            }
            slide.eq(indSlide).show();
            $(".slide-container").find(".slide-box .pagination span").eq(indSlide).addClass("active");
        });

        //category
        rs.categories.forEach( (e) =>{
            var name_href = (e.name).replace(' ','-');
            category_box += `
                <div class="swiper-slide" style="background-color:${e.color}" data-id="${e.id}">
                    <a href="/Web/Product/${name_href}">
                        <span>${e.name}</span>
                    </a> 
                </div>
            `;
        });
        container_category.append(category_box);
        container_category.find('.swiper-slide').click(function(){
            var eThis = $(this);
            var cate = eThis.data("id");
            var txt='';
            var pro_container = body.find(".product-con .product .pro-container #product");
            $.ajax({
                url:`/API/Web/Product/${cate}`,
                type:'POST',
                success:function(data){   
                    data.products.forEach( (e) =>{
                        txt +=`
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
        });

        //product
        rs.products.forEach( (e) =>{
// animation skelaton template
            // product_box += `
            //     <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 product-box" data-id="${e.id}">
            //         <div class="product">
            //             <a href="/Web/Product_Detail/${e.id}">
            //                 <div class="img-box">
            //                     <img class="skeleton" alt="" id="cover-img" />
            //                     <span class="pcode"> Code: </span>
            //                 </div>
            //                 <div class="txt-box">
            //                     <div class="skeleton skeleton-text"></div>
            //                     <div class="skeleton skeleton-text"></div>
            //                 </div>
            //             </a>
            //             <div class="shop"><img class="card__header header__img skeleton" /></div>
            //             <div class="fb"> <img class="card__header header__img skeleton" /></div>
            //             <div class="link-cp"><img class="card__header header__img skeleton" /></div>
            //         </div>
            //     </div>
            // `;
            product_box += `
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 product-box" data-id="${e.id}">
                    <div class="product">
                        <a href="/Web/Product_Detail/${e.id}">
                            <div class="img-box">
                                <img src="http://localhost:8000/storage/${e.product__images}" alt="">
                                <span class="pcode"> Code: </span>
                            </div>
                            <div class="txt-box">
                                <h1>${e.name.substr(0,75) + "..."}</h1>
                                <h2>Price : ${e.price}</h2>
                            </div>
                        </a>
                        <div class="shop" data-id="${e.id}"><i class="fa-solid fa-cart-plus"></i></div>
                        <div class="fb"><i class="fa-brands fa-square-facebook"></i></div>
                        <div class="link-cp"><i class="fa-solid fa-link"></i></div>
                    </div>
                </div>
            `;
        });
        container.append(product_box);
        // product detail
        body.find('.product-container #product .product').on('click',function(){
            var eThis = $(this);
            var id = eThis.data("id");
            var txt='';
            var container = body.find('.pro-detail-con #product_detail .pro-detail-box');
            var url = `/API/Web/Product_Detail/${id}`;
            $.ajax({
                url:url,
                type:'GET',
                // dataType:"json",
                success:function(data){   
                    console.log(data.product_detail);
                    data.product_detail.forEach( (e) =>{
                        txt += `
                                <div class="box">
                                    <div class="img-box">
                                        <img src="{{asset('home/css/slide.webp')}}" alt="">
                                        <div class="filter-img">
                                            <div class="swiper mySwiper">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide" style="background-color:#FFC107">
                                                        <a>
                                                            <img src="http://localhost:8000/storage/${e.product__images}" alt="">
                                                        </a> 
                                                    </div>
                                                </div>
                                                <div class="next-cate"><i class="fa-solid fa-angle-right"></i></div>
                                                <div class="back-cate"><i class="fa-solid fa-angle-left"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="txt-box">
                                        <h1 class="title1">${e.name}</h1>
                                        <div class="row product-feature">
                                            <div class="col-xl-6 col-lg-6">
                                                <h1 class="title2">Price :</h1>
                                                <span style="font-family: 'Hanuman', serif;">${e.price}</span>
                                            </div>
                                        </div>
                                        <div class="row product-feature">
                                            <div class="col-xl-6 col-lg-6">
                                                <h1 class="title2">Category :</h1>
                                                <span style="font-family: 'Hanuman', serif;">${e.category_name}</span>
                                            </div>
                                        </div>
                                        <div class="row product-feature">
                                            <div class="col-xl-6 col-lg-6">
                                                <h1 class="title2">Layout :</h1>
                                                <span style="font-family: 'Hanuman', serif;">${e.layout_name}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 add-card">
                                                <div class="qty">
                                                    <button class="btn" id="minus">
                                                        <i class="fa-solid fa-minus"></i>
                                                    </button>
                                                    <input type="text" class="form-control" id="qty" value="1">
                                                    <button class="btn" id="plus">
                                                        <i class="fa-solid fa-plus"></i>
                                                    </button>
                                                </div>
                                                <button class="btn">Add To Card</button>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                        `;
                    })
                }	
            }); 
        });
        // add card
        body.find('.product-container #product .product-box .product .shop').click(function(){
            if(rs.check=='true'){
                var eThis = $(this);
                var id = eThis.data("id");
                var txt='';
                $.ajax({
                    url:`/API/Web/Add_Card/${id}`,
                    type:'GET',
                    success:function(data){   
                        data.product.forEach((e)=>{
                            txt += `
                                <div class="card-box">
                                    <div class="img-box">
                                        <img src="{{asset('home/css/22.webp')}}" alt="">
                                    </div>
                                    <div class="txt-box">
                                        <h2>ISO Q1 & Q1 Pro & V1 & K2 & K2 Pro OEM Dye-Sub PBT Keycap Set - Blue</h2>
                                        <h3>
                                            <label>
                                                price : <span class="disable"> $210.00 USD</span> 
                                            </label>
                                            <label>
                                                After-Discount : <span>$189.00 USD</span>
                                            </label>
                                        </h3>
                                        <h5>
                                            category : <label>custom keyboard</label> 
                                        </h5>
                                        <h6>
                                            layout : <label>60%</label> 
                                        </h6>
                                        <div class="input-group mb-3 qty">
                                            <span class="input-group-text">-</span>
                                            <input type="text" class="form-control" value="1">
                                            <span class="input-group-text">+</span>
                                        </div>
                                        <i class="fa-regular fa-trash-can"></i>
                                    </div>
                                </div>
                            `;
                        });
                        body.find('.card-container .detail h1').append(txt);
                    }				
                });
            }else if(rs.check=='false'){
                alert("Please Login First !!!");
            }
        });

        //mouse
        rs.mouse.forEach( (e) =>{
            mouse_box += `
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 product-box">
                    <div class="product">
                        <a>
                            <div class="img-box" style="height:74%">
                                <img src="http://localhost:8000/storage/${e.product__images}" alt="">
                                <span class="pcode"> Code: </span>
                            </div>
                            <div class="txt-box" style="height:26%">
                                <h1>${e.name}</h1>
                                <h2>Price : ${e.price}</h2>
                            </div>
                        </a>
                        <div class="shop"><i class="fa-solid fa-cart-plus"></i></div>
                        <div class="fb"><i class="fa-brands fa-square-facebook"></i></div>
                        <div class="link-cp"><i class="fa-solid fa-link"></i></div>
                    </div>
                </div>
            `;
        });
        container_mouse.append(mouse_box);

        //keycap
        rs.keycap.forEach( (e) =>{
            keycap_box += `
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 product-box">
                    <div class="product">
                        <a>
                            <div class="img-box" style="height:77%">
                                <img src="http://localhost:8000/storage/${e.product__images}" alt="">
                                <span class="pcode"> Code: </span>
                            </div>
                            <div class="txt-box" style="height:23%">
                                <h1>${e.name}</h1>
                                <h2>Price : ${e.price}</h2>
                            </div>
                        </a>
                        <div class="shop"><i class="fa-solid fa-cart-plus"></i></div>
                        <div class="fb"><i class="fa-brands fa-square-facebook"></i></div>
                        <div class="link-cp"><i class="fa-solid fa-link"></i></div>
                    </div>
                </div>
            `;
        });
        container_keycap.append(keycap_box);
    }
// add note to card
    body.find('.card-container .order_summary h2').click(function(){
        var eThis = $(this);
        if(eThis.find(".fa-chevron-down").length > 0){
            eThis.find("i").addClass("fa-chevron-up");
            eThis.find("i").removeClass("fa-chevron-down");
            eThis.css({"border-bottom":"none"});
            body.find('.card-container .order_summary textarea').css({"display":"block"});
        }else if(eThis.find(".fa-chevron-down").length == 0){
            eThis.find("i").addClass("fa-chevron-down");
            eThis.find("i").removeClass("fa-chevron-up");
            eThis.css({"border-bottom":"1px solid #fff"});
            body.find('.card-container .order_summary textarea').css({"display":"none"});
        }
    });
});