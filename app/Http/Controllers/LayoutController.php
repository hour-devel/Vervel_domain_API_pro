<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layout;

class LayoutController extends Controller
{
    public function index(Request $request){
        $paginate = 10;
        if(isset($request->limite)){
            $paginate=$request->limite;
        }
        $count= Layout::all()->count();
        $layouts = Layout::
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

        return view('Admin.layouts_pro.index',['layouts'=>$layouts,'count'=>$count]);
    }

    public function create(){
        return view('Admin.layouts_pro.create');
    }

    public function store(Request $request){

        $layout = New Layout;

        $request->validate([
            'name' => 'required|max:255|unique:layouts,name',
            'status' => 'required',
        ]);

        $layout->user_id = 1;
        $layout->name = $request->name;
        $layout->status = $request->status;

        $layout->save();

        return back()->with('success','Layout Create Successfully');
    }

    public function show($id){
        $layout = Layout::findOrfail($id);

        return view('Admin.layouts_pro.update',['layout'=>$layout]);
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|max:255',
            'status' => 'required',
        ]);

        $layout = Layout::find($id);

        $layout-> user_id = 1;
        $layout-> name = $request -> name;
        $layout-> status = $request -> status;

        $layout->save();

        return back()->with('success','Layout updated successfully');
    }
}
