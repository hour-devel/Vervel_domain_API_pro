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
<div class="tab" style="background-color:{{$back_color}};">
    <div class="form" style="background-color: {{$table_color}}">
        <form action="{{route('Product.update',['Product'=>$product->id])}}" method="POST" enctype="multipart/form-data" style="height:98%;width:100%">
            @csrf
            @method('PUT')
            <div class="textarea">
                <label for="" style="color:{{$label_color}}">Desription</label>
                <textarea name="des" id="des" style="border:2px solid {{$input_border}}">{{$product->description}}</textarea>
            </div>
            <div class="row">
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Name</label>
                    </div>
                    <div class="box">
                        <input type="text" name="name" value="{{$product->name}}"
                        class="form-control @error('name') is-invalid @enderror" 
                        placeholder="Product Name" style="border:2px solid {{$input_border}}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                </div>
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Category</label>
                    </div>
                    <div class="box">
                        <select name="category_id" class="form-select @error('category') is-invalid @enderror"" style="border:2px solid {{$input_border}}">
                            @foreach ($categories as $category)
                                <option {{ $product->category_id == $category->id ? "selected" : "" }} value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Layout</label>
                    </div>
                    <div class="box">
                        <select name="layout_id" class="form-select @error('layout') is-invalid @enderror"" style="border:2px solid {{$input_border}}">
                            @foreach ($layouts as $layout)
                                <option {{ $product->layout_id == $layout->id ? "selected" : "" }} value="{{$layout->id}}">{{$layout->name}}</option>
                            @endforeach
                        </select>
                        @error('layout')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Name_Link</label>
                    </div>
                    <div class="box">
                        <input type="text" name="name_link" value="{{$product->name_link}}"
                        class="form-control @error('name_link') is-invalid @enderror" 
                        placeholder="Name_Link" style="border:2px solid {{$input_border}}">
                        @error('name_link')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                </div>
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Poster</label>
                    </div>
                    <div class="box">
                        <input type="file" name="poster" id="poster" class="form-control @error('poster') is-invalid @enderror" 
                        placeholder="Product poster" style="border:2px solid {{$input_border}}">
                        @error('poster')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Photo</label>
                    </div>
                    <div class="box" id="product_update_box">
                        <i class="fa-solid fa-xmark"></i>
                        <input type="file" name="photo[]" class="form-control @error('photo') is-invalid @enderror" 
                        placeholder="Product Photo" style="border:2px solid {{$input_border}}" multiple>
                        @error('photo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Cost</label>
                    </div>
                    <div class="box">
                        <input type="text" name="cost" value="{{$product->cost}}"
                        class="form-control @error('cost') is-invalid @enderror" 
                        placeholder="Product Cost" style="border:2px solid {{$input_border}}">
                        @error('cost')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                </div>
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Price</label>
                    </div>
                    <div class="box">
                        <input type="text" name="price" id="price" value="{{$product->price}}"
                        class="form-control @error('price') is-invalid @enderror" 
                        placeholder="Product Price" style="border:2px solid {{$input_border}}">
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Discount</label>
                    </div>
                    <div class="box">
                        <select name="discount" id="discount" class="form-select @error('discount') is-invalid @enderror" style="border:2px solid {{$input_border}}">
                            <option {{ $product->dis == 0 ? "selected" : "" }} value="0">0</option>
                            <option {{ $product->dis == 10 ? "selected" : "" }} value="10">10</option>
                            <option {{ $product->dis == 20 ? "selected" : "" }} value="20">20</option>
                            <option {{ $product->dis == 30 ? "selected" : "" }} value="30">30</option>
                            <option {{ $product->dis == 50 ? "selected" : "" }} value="50">50</option>
                        </select>
                        @error('discount')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">After-Dis</label>
                    </div>
                    <div class="box">
                        <input type="text" name="after_dis" id="after_dis" value="{{$product->after_dis}}"
                        class="form-control @error('after_dis') is-invalid @enderror" 
                        placeholder="After_Discount" style="border:2px solid {{$input_border}}" readonly>
                        @error('after_dis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Location</label>
                    </div>
                    <div class="box">
                        <select name="location" class="form-select @error('location') is-invalid @enderror"" style="border:2px solid {{$input_border}}">
                            <option {{ $product->location == 1 ? "selected" : "" }} value="1">1</option>
                            <option {{ $product->location == 2 ? "selected" : "" }} value="2">2</option>
                        </select>
                        @error('location')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="column">
                    <div class="txt">
                        <label for="" style="color:{{$label_color}}">Status</label>
                    </div>
                    <div class="box">
                        <select name="status" class="form-select @error('status') is-invalid @enderror"" style="border:2px solid {{$input_border}}">
                            <option {{ $product->status == 1 ? "selected" : "" }} value="1">Show</option>
                            <option {{ $product->status == 0 ? "selected" : "" }} value="0">Hide</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="rowpro">
                <div class="columnpro">
                    @php    
                        $image = App\Models\Product__images::where('product_id',$product->id)->get();
                    @endphp
                    @foreach ($image as $val)
                        <div class="box" id="product_update_box" style="background-image: url({{asset('storage/'.$val->img_name)}});background-size:cover;">
                            <input type="hidden" id="file" value="{{$val->img_name}}">
                            <a href="{{route('Product_Image.destroy',['id'=>$val->id])}}">
                                <i class="fa-solid fa-xmark"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="message">
                    <p>{{$message}}</p>
                </div>
            @endif
            <div class="filter-input">
                <div class="txt">
                    <p>Filter</p>
                </div>
                <div class="select">
                    <select name="" class="form-select" id="filter_input">
                        <option >Filter-Input</option>
                        <option value="1">Photo & Description</option>
                        <option value="0">Name,Category,...</option>
                    </select>
                </div>
            </div>
            <div class="action">
                <a href="{{route('Product.index',['mode'=>$mode])}}">
                    <button type="button" class="btn btn-danger cancel">Cancel</button>
                </a>
                <button type="submit" class="btn btn-primary add">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.tiny.cloud/1/o9f566b78vd7zz0dmziwyefslj5nffcvwu363hwe4gpuy6v0/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'visualchars mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
        toolbar: 'visualchars | undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
        ],
        image_title: true,
        automatic_uploads: true,
        images_upload_url: '/api/product/upload',
        file_picker_types: 'image',
        height : "580",
        file_picker_callback: function (cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function () {
            var file = this.files[0];

            var reader = new FileReader();
            reader.onload = function () {
                var id = 'blobid' + (new Date()).getTime();
                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);
                cb(blobInfo.blobUri(), { title: file.name });
            };
            reader.readAsDataURL(file);
            };
            input.click();
            
        },
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
</script>
@endsection