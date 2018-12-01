<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Transaksi;
use App\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class transaksiController extends Controller
{
    public function checkout(Request $request){
        $data = new Transaksi();
        $data->tanggal_transc = date().now();
        $data->id_cus = $request->id_cus;
        $data->id_prod = $request->id_prod;
        $data->id_pake = $request-id_paket;
        
        
    }
    
    public function hapusbarang($id, $user){
        DB::table('carts')->where('id', '=', $id)->delete();
        
        return redirect('keranjang/'.$user)->with('alert','barang terhapus !');
    }
    
    public function bayar(Request $req, $idcus){
        $keranjang =  DB::table('carts')
            ->join('users', 'users.id', '=', 'carts.idcus')
            ->join('produks', 'produks.id', '=', 'carts.idprod')
            ->where('carts.idcus','=',$idcus)            
            ->select('produks.*', 'carts.*')
            ->get();      
        $count =0;
        foreach($keranjang as $total){
            $jumlah = $total->harga_prod * $total->qtt;
            $count = $count+$jumlah;
        }                
        foreach ($keranjang as $carts){
            $prod = $carts->nama_prod;
            $data = new Transaksi();
            $data->id_cus = $idcus;
            $data->id_prod = $carts->idprod;
            $data->id_paket = $req->kurir;
            $data->namapenerima = $req->namapenerima;
            $data->nohp = $req->nohp;
            $data->alamat = $req->alamat;
            $data->kota = $req->kota;
            $data->prov = $req->prov;
            $data->kodepos = $req->kodepos;
            $data->status = 1;
            $data->save();            
        }
        DB::table('carts')                
                ->where('idcus','=',$idcus)->delete();
        $transaksi = DB::table('transaksis')->where('id_cus','=',$idcus,'status','=',1)->select('transaksis.*');
        
        return response()->json($transaksi, 200);
    }
} 
