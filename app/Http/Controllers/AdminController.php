<?php

namespace App\Http\Controllers;

use App\Models\Bayar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $req){
        $data=DB::table('pembayaran')
        ->join('tanggal','pembayaran.id_tanggal','=','tanggal.id_tanggal')
        ->join('lapangan','pembayaran.id_lapangan','=','lapangan.id_lap')
        ->join('waktu','tanggal.id_waktu','=','waktu.id_waktu')
        ->where('tanggal.nama','like','%'.$req->cari.'%')
        ->orWhere('pembayaran.status','like','%'.$req->cari.'%')->get();
        
        return view('admin.dashboardadmin',['data1'=>$data]);
    }
    public function konfirmasi($id){
        $update=Bayar::where('id_bayar','=',$id)->update([
            'status'=>"Sudah Dikonfirmasi"
        ]);
        if($update){
            return redirect('/dashboard/admin')->with('sukses','Data Berhasil Dikonfirmasi');
        }
    }
    public function user(Request $req){
        $user=User::where('name','like','%'.$req->cari.'%')->get();
        return view('admin.user',['user'=>$user]);
    }
    public function dapat(){
        
       
        $tanggal=DB::table('tanggal')
        ->select('bulan')
        ->distinct()
        ->get();
        
        return view('admin.pendapatan',['bulan'=>$tanggal]);
    }
}
