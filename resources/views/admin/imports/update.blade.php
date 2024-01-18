@extends('admin.layout.app')

@section('title','Admin')

@section('content')
<div class="bar">
    {{-- <p>
        <i class="fa-solid fa-bars"></i>
    </p> --}}
    <div class="slide">
        <p>
            <i class="fa-solid fa-k" style="color:#00FF7F"></i>
            <i class="fa-solid fa-e" style="color:#E67E22"></i>
            <i class="fa-solid fa-y" style="color:#00BFFF"></i>
            <i class="fa-solid fa-c" style="color:#DC3545"></i>
            <i class="fa-solid fa-h" style="color:#40E0D0"></i>
            <i class="fa-solid fa-r" style="color:#7B68EE"></i>
            <i class="fa-solid fa-o" style="color:#FFC107"></i>
            <i class="fa-solid fa-n" style="color:#FF1493"></i>
        </p>
    </div>
    <i class="fa-regular fa-comments"></i>
    <i class="fa-regular fa-bell"></i>
    @if((collect(request()->query())->only('mode'))->isNotEmpty())
        @foreach (collect(request()->query())->only('mode') as $key => $val)
            <input type="hidden" name="{{$key}}" value="{{$val}}">
            @if($val=='dm_on')
                <p style="display: none">
                    {{$mode='dm_on'}}
                </p>
            @else
                @if($val=='dm_off')
                <p style="display: none">
                    {{$mode='dm_off'}}
                </p>
                @endif
            @endif
            <a href="{{$url = url()->full()."&screen=full";}}" style="color: #454D55"><i class="fa-solid fa-maximize max"></i></a>
            <a href="{{$url = url()->full()."&screen=exit";}}" style="color: #454D55"><i class="fa-solid fa-minimize min"></i></a>
        @endforeach
    @endif
</div>
@if((collect(request()->query())->only('mode'))->isNotEmpty())
    @foreach (collect(request()->query())->only('mode') as $key => $val)
        <input type="hidden" name="{{$key}}" value="{{$val}}">
        @if($val=='dm_on')
            <p style="display: none"> 
                {{$back_color='#454D55'}}
                {{$table_color='#343A40'}}
                {{$color='#eee'}}
                {{$th_color='#fff'}}
                {{$td_color='#00FF7F'}}
                {{$label_color='#fff'}}
                {{$input_border='#00FF7F'}}
            </p>
        @else
            @if($val=='dm_off')
            <p style="display: none">
                {{$back_color='#eee'}} 
                {{$table_color='#fff'}}
                {{$color='#454D55'}} 
                {{$th_color='#aaa'}}
                {{$td_color='navy'}}
                {{$label_color='#666'}}
                {{$input_border='#6F5CC4'}}
            </p>
            @endif
        @endif
    @endforeach
    @else
    <p style="display: none"> 
        {{$back_color=''}}
        {{$table_color=''}}
        {{$color=''}}
        {{$th_color=''}}
        {{$td_color=''}}
        {{$label_color=''}}
        {{$input_border=''}}
    </p>
@endif
<div class="tab" style="background-color:{{$back_color}}">
    <div class="form" style="background-color: {{$table_color}}">
        <form action="{{route('Import.update',['Import'=>$import->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Product</label>
                    </div>
                    <div class="box">
                        <select id="product" name="product" class="form-select @error('product') is-invalid @enderror" style="border:2px solid {{$input_border}}">
                            @foreach ($products as $product)
                                <option {{$import->product_id == $product->id ? "selected" : ""}} value="{{$product->id}}" data-price="{{$product->price}}">
                                    {{$product->name}}
                                </option>
                            @endforeach
                        </select>
                        @error('product')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Quantity</label>
                    </div>
                    <div class="box">
                        <input type="text" value="{{$import->qty}}"
                        id="qty" name="qty" class="form-control @error('qty') is-invalid @enderror" 
                        placeholder="Product Quantity" style="border:2px solid {{$input_border}}">
                        @error('qty')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                </div>
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Amount</label>
                    </div>
                    <div class="box">
                        <input type="text" value="{{$import->amount}}"
                        id="amount" name="amount" class="form-control @error('amount') is-invalid @enderror" 
                        placeholder="Product Quantity" style="border:2px solid {{$input_border}}" readonly>
                        @error('amount')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="message">
                    <p>{{$message}}</p>
                </div>
            @endif
            <div class="action">
                <a href="{{route('Import.index',['mode'=>$mode])}}">
                    <button type="button" class="btn btn-danger cancel">Cancel</button>
                </a>
                <button type="submit" class="btn btn-primary add">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection