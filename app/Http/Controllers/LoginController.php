<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function login(Request $req){
        if(Auth::attempt(['email' => $req->email, 'password' => $req->pass])){
            $role=Auth::user()->role;
            if($role==1){
                return redirect('/dashboard');
            }else{
                return redirect('/home');
            }
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
