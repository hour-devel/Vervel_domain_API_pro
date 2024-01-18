<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request){
        $paginate = 10;
        if(isset($request->limite)){
            $paginate=$request->limite;
        }
        $count= User::all()->count();
        $users = User::
        when($request->search, function ($query,$search) use($request) {
            $query->when($request->filter, function ($query,$filter) use($search){
                if($filter=='role'){
                    $query->whereHas('role', function ($sub_query) use($search,$filter){
                        $sub_query->where('name','=',$search);
                    });
                }else if($filter=='name'){
                    $query->where('first_name','LIKE','%'.$search.'%');
                }
            });
        })
        ->paginate($paginate)->withQueryString();
        return view('admin.users.index',['users'=>$users,'count'=>$count]);
    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(Request $request){
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'birthdate' => 'required',
            'address' => 'required',
            'photo' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone_num' => 'required',
            'role_id' => 'required',
        ]);
        $user = New User;
        $user->role_id =  $request->role_id;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->birthdate = $request->birthdate;
        $user->phone_num = $request->phone_num;
        $user->address = $request->address;
        $user->email = $request->email;
        $user -> pass = Hash::make($request -> password);

        if($request->hasFile('photo')){
            $file = time().'_'.$request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs(
                'uploads',
                $file,
                'public'
            );
            $user -> photo = $filePath;
        }

        $user->save();
        return back()->with('success','User created successfully');
    }

    public function show($id){
        $user =User::findOrfail($id);
        return view('admin.users.update',['user'=>$user]);
    }

    public function update(Request $request,$id){
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'birthdate' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone_num' => 'required',
            'role_id' => 'required',
        ]);
        $user = User::find($id);
        $user->role_id =  $request->role_id;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->birthdate = $request->birthdate;
        $user->phone_num = $request->phone_num;
        $user->address = $request->address;
        $user->email = $request->email;
        $user -> pass = Hash::make($request -> password);

        if($request->hasFile('photo')){
            $file = time().'_'.$request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs(
                'uploads',
                $file,
                'public'
            );
            $user -> photo = $filePath;
        }
        $user->save();

        return back()->with('success','User updated successfully');
    }
}
