<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index(Request $request){
        $paginate = 10;
        if(isset($request->limite)){
            $paginate=$request->limite;
        }
        $count= Customer::all()->count();
        $customers = Customer::when($request->search, function ($query,$search) use($request) {
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

        return view('admin.customers.index',['customers'=>$customers,'count'=>$count]);
    }
    public function store(Request $request){
        $validate = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_num' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $customer = New Customer;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone_num = $request->phone_num;
        $customer->email = $request->email;
        $customer->password = Hash::make($request -> password);
        if($validate){
            $customer -> save();
        }

        return back();
    }
    public function show(){

    }
    public function update(){

    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $check = "false";

        if (Auth::guard('customers')->attempt($credentials)) {

            $check = "true";

            $request->session()->regenerate();
 
            return redirect()->intended(route('index'))->with('check',$check);
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->intended(route('index'));
    }
}
