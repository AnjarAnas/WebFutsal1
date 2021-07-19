<?php

namespace App\Http\Controllers;

use App\Models\Bayar;
use App\Models\Tanggal;
use App\Models\Waktu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(){
        return view('Userlayouts.dashboard');
    }
    public function lapangan($id){
        $waktu=Waktu::get();
        $tanggal=DB::table('tanggal')->select('tanggal')->distinct()->where('tanggal','>=',date('Y-m-d'))->get();
        // dd($tanggal);
        $detail=DB::table('pembayaran')
        ->join('tanggal','pembayaran.id_tanggal','=','tanggal.id_tanggal')
        ->join('waktu','tanggal.id_waktu','=','waktu.id_waktu')
        ->join('users','pembayaran.id_user','=','users.id_user')
        ->where('pembayaran.id_lapangan','=',$id)->get();
        
        return view('Userlayouts.lapangan',['id'=>$id,'waktu'=>$waktu,'tanggal'=>$tanggal,'detail'=>$detail]);
    }
    public function jadwal($id){
        $tanggal=DB::table('tanggal')->select('tanggal')->distinct()->where('tanggal','>=',date('Y-m-d'))->get();
        // dd($tanggal);
        $detail=DB::table('pembayaran')
        ->join('tanggal','pembayaran.id_tanggal','=','tanggal.id_tanggal')
        ->join('waktu','tanggal.id_waktu','=','waktu.id_waktu')
        ->join('users','pembayaran.id_user','=','users.id_user')
        ->where('pembayaran.id_lapangan','=',$id)->get();
        return view('Userlayouts.jadwal',['tanggal'=>$tanggal,'detail'=>$detail,'id'=>$id]);
    }
    public function dataBook(){
        $bayar=DB::table('pembayaran')
        ->join('tanggal','pembayaran.id_tanggal','=','tanggal.id_tanggal')
        ->join('lapangan','pembayaran.id_lapangan','=','lapangan.id_lap')
        ->join('users','pembayaran.id_user','=','users.id_user')
        ->join('waktu','tanggal.id_waktu','=','waktu.id_waktu')
        ->where('pembayaran.id_user','=',Auth::user()->id_user)->get();
        
        return view('Userlayouts.book',['bayar'=>$bayar]);
    }
    public function book(Request $req){
        date_default_timezone_set('Asia/Jakarta');
        $date_now=date('Y-m-d H:i:s');
        $add_15=strtotime('+15 minutes',strtotime($date_now));
        $date_result=date('Y-m-d H:i:s',$add_15);
        
        $jlm_book=str_replace(",", "", $req->uang);
        $id_waktu=$req->waktu;
        $id_bayar=Str::random(14);
        $id_tanggal=Str::random(15);
        $waktu=Waktu::where('id_waktu','=',$id_waktu)->get();
        
        $tanggal=DB::table('tanggal')
        ->join('waktu','tanggal.id_waktu','=','waktu.id_waktu')->get();
        if(date('Y-m-d')<=$req->tgl){
            foreach($tanggal as $a){
                if($a->tanggal==$req->tgl && $a->waktu==$waktu[0]->waktu && $a->id_lap==$req->id_lap){
                    return redirect('/lap/'.$req->id_lap)->with('gagal','Tanggal Atau Waktu Sudah Tidak Tersedia, Silahkan Klick Tombol Jadwal Lapangan');
                }
            }
            $tanggal=Tanggal::create([
                'id_waktu'=>$id_waktu,
                'id_tanggal'=>$id_tanggal,
                'tanggal'=>$req->tgl,
                'id_user'=>Auth::user()->id_user,
                'kondisi'=>1,
                'nama'=>$req->nama,
                'id_lap'=>$req->id_lap
            ]);
            $bayar=Bayar::create([
                'id_bayar'=>$id_bayar,
                'jlm_bayar'=>$jlm_book,
                'id_tanggal'=>$id_tanggal,
                'id_lapangan'=>$req->id_lap,
                'dibuat'=>$date_now,
                'deadline'=>$date_result,
                'status'=>'Belum Dibayar',
                'id_user'=>Auth::user()->id_user
            ]);
            if($tanggal && $bayar){
                return redirect('/book')->with('sukses','Sukses, Segera Lakukan Pembayaran !!');
            }
        }else{
            return redirect('/lap/'.$req->id_lap)->with('gagal','Tanggal Tidak Valid');
        }
    }
    public function cari(Request $req,$id){
        $cari=DB::table('pembayaran')
        ->join('tanggal','pembayaran.id_tanggal','=','tanggal.id_tanggal')
        ->join('lapangan','pembayaran.id_lapangan','=','lapangan.id_lap')
        ->join('users','pembayaran.id_user','=','users.id_user')
        ->join('waktu','tanggal.id_waktu','=','waktu.id_waktu')
        ->where([['tanggal.tanggal','=',$req->cari],['tanggal.id_lap','=',$id]])
        ->get();
        
        if($cari->isEmpty()){
            return view('Userlayouts.cari',['cari'=>$cari])->with('sukses','Tanggal yang anda cari belum ada yang booking');
        }else{
            return view('Userlayouts.cari',['cari'=>$cari]);
        }
    }
    public function hapusPesan($id){
        $getData=Bayar::where('id_bayar','=',$id)->get();
        $hapusTanggal=Tanggal::where('id_tanggal','=',$getData[0]->id_tanggal)->delete();
        $deletPesan=Bayar::where('id_bayar','=',$id)->delete();
        if($deletPesan && $hapusTanggal){
            return response()->json(['sukses'=>'Data Berhasil Dihapus']);
        }
    }
}
