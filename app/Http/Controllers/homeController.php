<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Produk; 
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
