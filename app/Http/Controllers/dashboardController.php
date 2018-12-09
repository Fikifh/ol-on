<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Produk;
use App\User;
use Illuminate\Support\Facades\Session;
use App\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Kurir;

class dashboardController extends Controller
{
    public function home(){         
        if(Auth::guest()){
            $produk = Produk::all();
            return view('homenotlogin',['produk'=>$produk]);
        }  else {
            $idcus = Auth::user()->id;
            $produk = Produk::all();
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
            return view('home', ['produk'=>$produk,'count'=>$count])->with('keranjang',$keranjang);   
        }
        
    }
    public function detailproduk($id){
    	$ProdDetail = Produk::where('id', $id)->first();
    	return view('transaksi.detailProduk', ['ProdDetail'=>$ProdDetail]);
    }

    
    public function getKeranjang($idcus){         
        
        $keranjang =  DB::table('carts')
            ->join('users', 'users.id', '=', 'carts.idcus')
            ->join('produks', 'produks.id', '=', 'carts.idprod')
            ->where('carts.idcus','=',$idcus)            
            ->select('produks.*', 'carts.id', 'carts.*', 'users.name', 'users.nohp', 'users.provinsi', 'users.kabupaten', 'users.kecamatan', 'users.desa','users.kodepos')
            ->get();      
        $count =0;
        foreach($keranjang as $total){
            $jumlah = $total->harga_prod * $total->qtt;
            $count = $count+$jumlah;
        }
        $kurir = DB::table('kurirs')->select('*')->get();
        $pelanggan = User::where('id', $idcus)->first();
    
        $transaksi =  DB::table('transaksis')
            ->join('users', 'users.id', '=', 'transaksis.id_cus')
            ->join('produks', 'produks.id', '=', 'transaksis.id_prod')            
            ->where([
            ['transaksis.id_cus','=',$idcus],
            ['transaksis.status','=',1],
            ])            
            ->select('transaksis.*','transaksis.id', 'produks.harga_prod', 'produks.nama_prod', 'users.name', 'users.nohp', 'users.provinsi', 'users.kabupaten', 'users.kecamatan', 'users.desa','users.kodepos')
            ->get(); 

        return view('transaksi.keranjang',['pelanggan'=>$pelanggan,'kurir'=>$kurir, 'transaksi'=>$transaksi], ['count'=>$count])->with('keranjang',$keranjang);
    
    }
    
    
    public function beli($id, $idcus){ 
        $data = new Cart();
        $data->idprod = $id;
        $data->idcus = $idcus;        
        $data->save();
        return redirect('keranjang/'.$idcus);        
    }
    public function keranjang($id, $user){
        $a=0;
        $data = new Cart();
        $data->idprod = $id;
        $data->idcus = $user;        
        $data->save();
        
        return redirect('/');
    }
}
