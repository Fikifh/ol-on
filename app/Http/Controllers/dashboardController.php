<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Produk;
use Illuminate\Support\Facades\Session;

class dashboardController extends Controller
{
    public function home(){                 
        $produk = Produk::all();

        // show the edit form and pass the nerd
        return view('home', ['produk'=>$produk]);
    }
    public function detailproduk($id){
    	$ProdDetail = Produk::where('id', $id)->first();
    	return view('transaksi.detailProduk', ['ProdDetail'=>$ProdDetail]);
    }

    public function beli($id){   
        $ProdDetail = Produk::where('id', $id)->first();        
	   return view('transaksi.bayar',['ProdDetail'=>$ProdDetail]);
    }
}
