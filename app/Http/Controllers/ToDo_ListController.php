<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDo_List;

class ToDo_ListController extends Controller
{
    public function index(){
        $todo_lists = ToDo_List::orderBy('id', 'desc')->get();

        return Response(['todo_lists'=>$todo_lists]);
    }
    public function store(Request $request){
        $todo_list = New ToDo_List;

        $todo_list -> name =  $request->name;
        $todo_list -> status =  1;

        $todo_list -> save();

        return back();
    }

    public function update(Request $request,$id){
        $todo_list = ToDo_List::find($id);
        $todo_list -> name = $request -> name;

        $todo_list -> save();

        return route('dashboard');
    }

    public function status_update($id,$status){
        $todo_list = ToDo_List::find($id);
        $todo_list -> status = $status;

        $todo_list -> save();
    }
}
