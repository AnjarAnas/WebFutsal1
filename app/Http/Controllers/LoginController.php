<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            date_default_timezone_set('Asia/Jakarta');
            if($role==1){
                User::where('id_user','=',Auth::user()->id_user)->update([
                    'last_login'=>date('Y-m-d h:i:s'),
                    'status_user'=>2
                ]);
                return redirect('/dashboard/admin');
            }else{
                User::where('id_user','=',Auth::user()->id_user)->update([
                    'last_login'=>date('Y-m-d h:i:s'),
                    'status_user'=>2
                ]);
                return redirect('/home');
                
            }
        }
    }
    public function logout(){
        User::where('id_user','=',Auth::user()->id_user)->update([
            
            'status_user'=>1
        ]);
        Auth::logout();
        
        return redirect('/');
    }
}
