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
            ->select('produks.*', 'carts.id', 'carts.*', 'users.name', 'users.nohp', 'users.alamat', 'users.kodepos')
            ->get();      
        $count =0;
        foreach($keranjang as $total){
            $jumlah = $total->harga_prod * $total->qtt;
            $count = $count+$jumlah;
        }
        $kurir = DB::table('kurirs')->select('*')->get();
        $pelanggan = User::where('id', $idcus)->first();
        return view('transaksi.keranjang',['pelanggan'=>$pelanggan,'kurir'=>$kurir], ['count'=>$count])->with('keranjang',$keranjang);
    }
    
    
    public function beli($id, $idcus){ 
        $data = new Cart();
        $data->idprod = $id;
        $data->idcus = $idcus;        
        $data->save();
        return redirect('keranjang/'.$idcus);
        
//        $keranjang =  DB::table('carts')
//            ->join('users', 'users.id', '=', 'carts.idcus')
//            ->join('produks', 'produks.id', '=', 'carts.idprod')
//            ->where('carts.idcus','=',$idcus)            
//            ->select('produks.*', 'carts.*')
//            ->get();
//        
//        
//        $totalbayar =  DB::table('carts')
//            ->join('users', 'users.id', '=', 'carts.idcus')
//            ->join('produks', 'produks.id', '=', 'carts.idprod')
//            ->where('carts.idcus','=',$idcus)                 
//                ->sum('produks.harga_prod','*','carts.qtt');
//        $count =0;
//        foreach($keranjang as $total){
//            $jumlah = $total->harga_prod * $total->qtt;
//            $count = $count+$jumlah;
//        }
//        $kurir = DB::table('kurirs')->select('*')->get();
//        return view('transaksi.keranjang', ['count'=>$count],['kurir'=>$kurir])->with('keranjang',$keranjang);
//        
//        $ProdDetail = Produk::where('id', $id)->first();         
//        $pembeli = User::where('email', $session)->first(); 
//	   return view('transaksi.beli')->with([
//              'ProdDetail'=>$ProdDetail ,
//               'pembeli'=>$pembeli,
//           ]);
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
