@extends('home.layout.app')

@section('title','Mouse')

@section('content')

<div class="container-fluid" style="margin-top: 120px;margin-bottom:30px">
    <div class="container title">
        <div class="row">
            <div class="col-xl-12 head-title">
                <h1>Mouse</h1>
            </div>
        </div>
    </div>
    <div class="container product-container">
        <div class="row" id="mouse">
            {{-- import form js --}}
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        fetch_tab_mouse_api();
        async function fetch_tab_mouse_api(){
            var url = "http://localhost:8000/API/Web/Mouse";
            var rp = await fetch(url);
            var rs = await rp.json();
            var mouse_tab='';
            var mouse_container = body.find(".product-container #mouse");

            rs.mouse.forEach((e)=>{
                mouse_tab += `
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 product-box">
                        <div class="product">
                            <a>
                                <div class="img-box">
                                    <img src="http://localhost:8000/storage/${e.product__images}" alt="">
                                    <span class="pcode"> Code: </span>
                                </div>
                                <div class="txt-box">
                                    <h2>Price : ${e.price}</h2>
                                    <h1>${e.name}</h1>
                                </div>
                            </a>
                            <div class="shop"><i class="fa-solid fa-cart-plus"></i></div>
                            <div class="fb"><i class="fa-brands fa-square-facebook"></i></div>
                            <div class="link-cp"><i class="fa-solid fa-link"></i></div>
                        </div>
                    </div>
                `;
            });
            mouse_container.append(mouse_tab);
        }
    });
</script>
@endsection