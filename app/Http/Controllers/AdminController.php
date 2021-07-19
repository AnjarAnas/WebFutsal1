<?php

namespace App\Http\Controllers;

use App\Models\Bayar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $data=DB::table('pembayaran')
        ->join('tanggal','pembayaran.id_tanggal','=','tanggal.id_tanggal')
        ->join('lapangan','pembayaran.id_lapangan','=','lapangan.id_lap')
        ->join('waktu','tanggal.id_waktu','=','waktu.id_waktu')->get();
        
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
}
