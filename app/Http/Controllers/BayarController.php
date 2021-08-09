<?php

namespace App\Http\Controllers;

use App\Models\Bayar;
use App\Models\Tanggal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Transaction;
use Illuminate\Support\Str;

class BayarController extends Controller
{
    public $token;
    public function bayar($id){
        $bayar=Bayar::where('id_bayar','=',$id)->get();
        if(isset($_GET['result'])){
            $order_id1=Str::random(20);
            $status=json_decode($_GET['result'],true);
            //dd($status);
            $order_id=$status['order_id'];
            $time=$status['transaction_time'];
            Bayar::where('id_bayar','=',$order_id)->update([
                'status'=>"Dalam Proses",
                
                'jam_bayar'=>date('H:i:s'),
                
            ]);
            session()->flash('sudah', 'Task was successful!');
            return view('Userlayouts.bayar',['token'=>$this->token]);
        }
        else{
            $bayar=Bayar::where('id_bayar','=',$id)->get();
        }
        if(!$bayar->isEmpty()){
            if ($bayar[0]->status=="Belum Dibayar"){
                
            
                \Midtrans\Config::$serverKey = 'SB-Mid-server-ZEJZWgdliopUKuEZFZvsYs8F';
                // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
                \Midtrans\Config::$isProduction = false;
                // Set sanitization on (default)
                \Midtrans\Config::$isSanitized = true;
                // Set 3DS transaction for credit card to true
                \Midtrans\Config::$is3ds = true;
                
                $params = array(
                    'transaction_details' => array(
                        'order_id' => $id,
                        'gross_amount' => $bayar[0]->jlm_bayar,
                    ),
                    'customer_details' => array(
                        'first_name' => 'Kepada',
                        'last_name' => Auth::user()->name,
                        'email' => Auth::user()->email,
                        'phone' => '08111222333',
                    ),
                );
                
                $this->token = \Midtrans\Snap::getSnapToken($params); 
                session()->flash('bayar','iya');
                return view('Userlayouts.bayar',['token'=>$this->token,'bayar'=>$bayar]);
            }else if($bayar[0]->status=="Dalam Proses" || $bayar[0]->status=="settlement" || $bayar[0]->status=="Sudah Dikonfirmasi"){
                // $status=Transaction::status($id);
                // dd($status);
                \Midtrans\Config::$serverKey = 'SB-Mid-server-ZEJZWgdliopUKuEZFZvsYs8F';
                // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
                \Midtrans\Config::$isProduction = false;
                // Set sanitization on (default)
                \Midtrans\Config::$isSanitized = true;
                // Set 3DS transaction for credit card to true
                \Midtrans\Config::$is3ds = true;
                $notif = Transaction::status($id);
                $notif=json_decode(json_encode($notif),true);
                
                $va=$notif['va_numbers'][0]['va_number'];
                $bank=$notif['va_numbers'][0]['bank'];
                $waktu=$notif['transaction_time'];
                $order_id=$notif['order_id'];
                $trx_id=$notif['transaction_id'];
                $waktu_bayar=0;
                if($bayar[0]->status=="settlement"){
                    $waktu_bayar=$notif['settlement_time'];
                }
                
                
                $status=$notif['transaction_status'];
                if($status=="settlement"){
                    Bayar::where('id_bayar','=',$id)->update([
                        'status'=>$notif['transaction_status']
                    ]);
                    Tanggal::where('id_tanggal','=',$bayar[0]->id_tanggal)->update([
                        'kondisi'=>2
                    ]);
                }
                session()->flash('proses','iya');
                return view('Userlayouts.bayar',['bayar'=>$bayar,'va'=>$va,'bank'=>$bank,'waktu'=>$waktu,'trx_id'=>$trx_id,'order_id'=>$order_id,'status'=>$status,'token'=>$this->token,'waktu_bayar'=>$waktu_bayar]);
            }
            
        }
    }
}
