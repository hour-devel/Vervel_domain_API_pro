@extends('home.layout.app');

@section('title','Card')

@section('content')
    <div class="container-fluid card-container">
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                <div class="detail">
                    <h1> <span></span>  Your Card</h1>
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
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                <div class="order_summary">
                    <h1>Order-Summary</h1>
                    <h2>Add Order Note <i class="fa-solid fa-chevron-down"></i></h2>
                    <textarea name="" id="" cols="30" rows="9"></textarea>
                    <h3>Subtotal : <span>$420.00 USD</span></h3>
                    <button type="button" class="btn btn-secondary check-out">Check Out</button>
                    <button type="button" class="btn btn-secondary bank">ABA</button>
                </div>
            </div>
        </div>
    </div>
@endsection
