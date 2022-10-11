<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
class LoginAuthController extends Controller
{
    //
    function login(){
        return view("auth.login");
    }
    function registration(){
        return view("auth.registration");
    }
    function registerUser(Request $req){
        // echo "Value posted";
        $req->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:15'
        ]);
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $data = $user->save();
        if ($data) {
            # code...
            return redirect('login')->with('success','You have registered sucessfully');
        }
        else {
            # code...
            return back()->with('fail','Something wrong');
        }
    }
    function loginUser(Request $req){
        $req->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:15'
        ]);
        $user = User::where('email','=',$req->email)->first();
        if ($user) {
            # code...
            if (Hash::check($req->password,$user->password)) {
                # code...
                $req->session()->put('loginId', $user->id);
                return redirect('dashboard');
            }
            else {
                return back()->with('fail','Password not matched.');
            }
        }
        else {
            return back()->with('fail','This email is not registered !! please ragister then login.');
        }
    }
    function dashboard(){
        $data = array();
            if (Session::has('loginId')) {
                # code...
                $data = User::where('id','=',Session::get('loginId'))->first();
            }
            return view('dashboard',compact('data'));
    }

    function logout(){
        if (Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
