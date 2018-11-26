<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Transaksi;
use App\Cart;
use Illuminate\Support\Facades\DB;

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
} 
