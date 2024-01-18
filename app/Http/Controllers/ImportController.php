<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Import;
use App\Models\Import_details;
use App\Models\Product;

class ImportController extends Controller
{
    public function index(Request $request){
        $paginate = 10;
        if(isset($request->limite)){
            $paginate=$request->limite;
        }
        $count = Import::all()->count();
        $imports = Import::
        orderBy('id','DESC')
        ->when($request->search, function ($query,$search) use($request) {
            $query->when($request->filter, function ($query,$filter) use($search){
                if($filter=='user'){
                    $query->whereHas('user', function ($sub_query) use($search,$filter){
                        $sub_query->where('name','LIKE','%'.$search.'%');
                    });
                }
            });
        })
        ->paginate($paginate)->withQueryString();

        return view('admin.imports.index',['imports'=>$imports,'count'=>$count]);
    }

    public function create(){
        $products = Product::select('id','name','price')->get();

        return view('admin.imports.create',['products'=>$products]);
    }

    public function add($id){
        $product = Product::where('id',$id)->get();
        return Response(['product' => $product]);
    }

    public function store(Request $request){
        $validate =$request->validate([
            'product' => 'required',
            'qty' => 'required',
        ]);
        
        $import = New Import;
        $import -> user_id = 1;
        $import -> product_id = $request->product;
        $import -> qty = $request->qty;

        $imports = Import::all();
        if($imports){
            foreach($imports as $item){
                if($item->product_id == $request -> product ){
                    $import = Import::find($item->product_id);
                    $import -> user_id =$item -> user_id;
                    $import -> product_id = $request -> product;
                    $import -> qty = $item -> qty + $request->qty;
                }else{
                    $import = New Import;
                    $import -> user_id = 1;
                    $import -> product_id = $request->product;
                    $import -> qty = $request->qty;
                }
            }
        }

        if($validate){

            $import->save();

            $import_detail = New Import_details;
            $import_detail -> import_id = $import ->id;
            $import_detail -> product_id = $request -> product;
            $import_detail -> qty= $request->qty;
            $import_detail -> amount= $request->amount;

            $import_detail ->save();
        }



        return back()->with('success','Import Successfully');
    }

    public function show($id){
        $products = Product::select('id','name','price')->get();
        $import = Import::find($id);

        return view('admin.imports.update',['import'=>$import,'products'=>$products]);
    }

    public function update(){

    }

    public function import_detail(){
        $import_details = Import_details::get();

        return view('admin.imports.import_detail',['import_details'=>$import_details]);
    }
}
