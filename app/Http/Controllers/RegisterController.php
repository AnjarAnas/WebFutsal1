<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }
    public function register(Request $req){
        if($req->pass == $req->ver_pass){
            $id_user=Str::random(8);
            $user=User::create([
                'name'=>$req->nama,
                'email'=>$req->email,
                'password'=>bcrypt($req->pass),
                'id_user'=>$id_user,
                'role'=>2,
                'status_user'=>1
            ]);
            if($user){
                return redirect('/')->with('sukses','User Telah Berhasil Dibuat');
            }else{
                return back()->with('gagal','User Gagal Dibuat');
            }
        }
        else{
            return back()->with('gagal','Password Yang Anda Masukan Tidak Sama');
        }
    }
}
