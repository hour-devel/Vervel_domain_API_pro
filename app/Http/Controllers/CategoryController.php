<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request){
        $paginate = 10;
        if(isset($request->limite)){
            $paginate=$request->limite;
        }
        $count= Category::all()->count();
        $categories = Category::
        when($request->search, function ($query,$search) use($request) {
            $query->when($request->filter, function ($query,$filter) use($search){
                if($filter=='user'){
                    $query->whereHas('user', function ($sub_query) use($search,$filter){
                        $sub_query->where('name','LIKE','%'.$search.'%');
                    });
                }else if($filter=='name'){
                    $query->where('name','LIKE','%'.$search.'%');
                }
            });
        })
        ->paginate($paginate)->withQueryString();

        return view('Admin.categories.index',['categories'=>$categories,'count'=>$count]);
    }

    public function create(){
        return view('Admin.categories.create');
    }

    public function store(Request $request){

        $category = New Category;

        $request->validate([
            'name' => 'required|max:255|unique:categories,name',
            'color' => 'required',
            'status' => 'required',
        ]);

        $category->user_id = 1;
        $category->name = $request->name;
        $category->color = $request->color;
        $category->status = $request->status;

        $category->save();

        return back()->with('success','Category Create Successfully');
    }

    public function show($id){
        $category = Category::findOrfail($id);

        return view('Admin.categories.update',['category'=>$category]);
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|max:255',
            'color' => 'required',
            'status' => 'required',
        ]);

        $category = Category::find($id);

        $category-> user_id = 1;
        $category-> name = $request -> name;
        $category-> color = $request -> color;
        $category-> status = $request -> status;

        $category->save();

        return back()->with('success','Category updated successfully');
    }
}
