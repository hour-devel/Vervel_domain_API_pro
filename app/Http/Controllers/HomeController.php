<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Http\Resources\Product_DetailResource;
use App\Models\Category;
use App\Models\Layout;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $check='false';
        if (Auth::guard('customers')->check()) {
            $check = 'true';
        }
        $array= [13,24,25,35,36];
        $products = Product::where('category_id','!=',7)->where('category_id','!=',6)->get();
        $mouse = Product::where('category_id','=',7)->limit(4)->get();
        $keycap = Product::where('category_id','=',6)->limit(4)->get();
        $categories = Category::select('id','name','color')->get();
        $big_slide = Product::select('id','poster','name','price','after_dis')->where('location','=',1)->whereIn('id',$array)->get();
        return Response([
            'products' => ProductResource::collection($products),
            'mouse' => ProductResource::collection($mouse),
            'keycap' => ProductResource::collection($keycap),
            'big_slide' => ProductResource::collection($big_slide),
            'categories' => $categories,
            'check'=>$check
        ]);
    }

    public function product_detail($id){
        $product_detail = Product::
        select(
            'products.id',
            'products.name',
            'products.price',
            'layouts.name as layout_name',
            'categories.name as category_name',
            'product__images.img_name',
        )
        ->join('product__images','products.id','=','product__images.product_id')
        ->join('categories','products.category_id','=','categories.id')
        ->join('layouts','products.layout_id','=','layouts.id')
        ->where('products.id','=',$id)->get();
        
        return Response(['product_detail' => $product_detail]);
    }

    public function product($cate=null,$lay=null,$limit=18){
        $categories = Category::select('id','name')->get();
        $layouts = Layout::select('id','name')->get(); 
        if($cate && $lay){
            $products = Product::where('category_id','=',$cate)
                    ->where('layout_id','=',$lay)
                    ->limit($limit)
                    ->get();
        }else if($cate && $lay==null){
            $products = Product::where('category_id','=',$cate)->limit($limit)->get();
        }else if($cate == 0){
            if($lay){
                $products = Product::where('layout_id','=',$lay)->limit($limit)->get();
            }else if(!$lay){
                $products = Product::inRandomOrder()->limit($limit)->get();
            }
        }

        return Response([
            'products' => ProductResource::collection($products),
            'categories' => $categories,
            'layouts' => $layouts,
        ]);
    }

    public function keyboard(){
        $keyboard = Product::where('category_id','!=',7)->where('category_id','!=',6)->get();
        return Response(['keyboard' => ProductResource::collection($keyboard)]);
    }

    public function mouse(){
        $mouse = Product::where('category_id','=',7)->limit(4)->get();
        return Response(['mouse' => ProductResource::collection($mouse)]);
    }

    public function keycap(){
        $keycap = Product::where('category_id','=',6)->limit(4)->get();
        return Response(['keycap' => ProductResource::collection($keycap)]);
    }

    public function add_card($id){

        $product = Product::where('id','=',$id)->get();

        return Response(['product' => ProductResource::collection($product)]);
    }
}
