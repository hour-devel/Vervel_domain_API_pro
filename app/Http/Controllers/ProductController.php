<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Product;
use App\Models\Product__images;
use App\Models\Category;
use App\Models\Layout;


class ProductController extends Controller
{
    public function index(Request $request){
        $paginate = 10;
        if(isset($request->limite)){
            $paginate=$request->limite;
        }
        $count= Product::all()->count();
        $products = Product::
        when($request->search, function ($query,$search) use($request) {
            $query->when($request->filter, function ($query,$filter) use($search){
                if($filter=='user'){
                    $query->whereHas('user', function ($sub_query) use($search,$filter){
                        $sub_query->where('first_name','LIKE','%'.$search.'%');
                    });
                }else if($filter=='cate_id'){
                    $query->whereHas('category', function ($sub_query) use($search,$filter){
                        $sub_query->where('id','=',$search);
                    });
                }else if($filter=='lay_id'){
                    $query->whereHas('layout', function ($sub_query) use($search,$filter){
                        $sub_query->where('id','=',$search);
                    });
                }else if($filter=='name'){
                    $query->where('products.name','LIKE','%'.$search.'%');
                }else{
                    $query->where($filter,'=',$search);
                }
            });
        })
        ->orderBy('id','DESC')
        ->paginate($paginate)->withQueryString();

        return view('admin.products.index',['products'=>$products,'count'=>$count]);
    }

    public function create(){
        $categories = Category::select('id','name')->where('status','=',1)->get();
        $layouts = Layout::select('id','name')->where('status','=',1)->get();
        return view('admin.products.create',['categories'=>$categories,'layouts'=>$layouts]);
    }

    public function store(Request $request){
        $product = New Product;

        $validate=$request->validate([
            'name' => 'required|max:255|unique:products,name',
            'poster' => 'required',
            'des' => 'required',
            'name_link' => 'required',
            'cost' => 'required',
            'price' => 'required',
            'photo' => 'required',
        ]);
        $product->category_id=$request->category_id;
        $product->layout_id=$request->layout_id;
        $product->user_id=1;
        $product->name=$request->name;
        if($request->hasFile('poster')){
            $file = time().'_'.$request->poster->getClientOriginalName();
            $filePath = $request->file('poster')->storeAs(
                'uploads',
                $file,
                'public'
            );
            $product -> poster = $filePath;
        }
        $product->description=$request->des;
        $product->name_link=$request->name_link;
        $product->cost=$request->cost;
        $product->price=$request->price;
        $product->dis=$request->discount;
        $product->after_dis=$request->after_dis;
        $product->location=$request->location;
        $product->status=$request->status;
        $product->view=0;

        if($validate){
            $product->save();

            if($request->hasFile('photo')){
                foreach($request->File('photo') as $pro_img){
                    $product_img = New Product__images;
                    $product_img->product_id = $product->id;
    
                    $file = $pro_img;
                    $img_name = time().'_'.$file->getClientOriginalName();
                    $filePath = $file->storeAs(
                        'uploads',
                        $img_name,
                        'public'
                    );
                    $product_img->img_name = $filePath;
    
                    $product_img->save();
                }
            }
        }
        return back()->with('success','Product Create Suncccessfully');
    }

    public function show($id){
        $product = Product::findOrfail($id);
        $categories = Category::select('id','name')->where('status','=',1)->get();
        $layouts = Layout::select('id','name')->where('status','=',1)->get();

        return view('admin.products.update',['product'=>$product,'categories'=>$categories,'layouts'=>$layouts]);
    }

    public function update(Request $request,$id){
        $product = Product::find($id);
        $validate=$request->validate([
            'name' => 'required|max:255',
            'des' => 'required',
            'name_link' => 'required',
            'cost' => 'required',
            'price' => 'required',
        ]);

        $product->category_id=$request->category_id;
        $product->layout_id=$request->layout_id;
        $product->user_id=1;
        $product->name=$request->name;
        if($request->hasFile('poster')){
            $file = time().'_'.$request->poster->getClientOriginalName();
            $filePath = $request->file('poster')->storeAs(
                'uploads',
                $file,
                'public'
            );
            $product -> poster = $filePath;
        }
        $product->description=$request->des;
        $product->name_link=$request->name_link;
        $product->cost=$request->cost;
        $product->price=$request->price;
        $product->dis=$request->discount;
        $product->after_dis=$request->after_dis;
        $product->location=$request->location;
        $product->status=$request->status;
        $product->view=0;
        
        if($validate){
            $product->save();

            if($request->hasFile('photo')){
                foreach($request->File('photo') as $pro_img){
                    $product_img = New Product__images;
                    $product_img->product_id = $product->id;
    
                    $file = $pro_img;
                    $img_name = time().'_'.$file->getClientOriginalName();
                    $filePath = $file->storeAs(
                        'uploads',
                        $img_name,
                        'public'
                    );
                    $product_img->img_name = $filePath;
    
                    $product_img->save();
                }
            }    
        }
        return back()->with('success','Product Update Suncccessfully');
    }

    //destroy product image
    public function destroy($id){
        $product_img = Product__images::find($id);

        $product_img->delete();

        return back()->with('success','Product_Image Delete Suncccessfully');
    }

    //tiny mce 
    public function upload(Request $request){
        $filename = $request->file('file')->getClientOriginalName();
        $filePath = $request->file('file')->storeAs(
            'uploads',
            $filename,
            'public'
        );

        return response(['location' => "/storage/$filePath"]);
    }
}
