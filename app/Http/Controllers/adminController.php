<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Produk;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class adminController extends Controller
{
    public function home(){
        $total = DB::table('transaksis')->where([['status',true]])->count('harga_satuan');
        $produk = DB::table('produks')->Where([['stok','>',0]])->select('*')->get();
        return view('admin.home',['total'=>$total, 'produk'=>$produk]);
    }
    public function addProduk(Request $request){
        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/img');
        $image->move($destinationPath, $input['imagename']);

        $data = new Produk();        
        $data->nama_prod = $request->nama_prod;
        $data->desc_prod = $request->desc_prod;
        $data->harga_prod = $request->harga_prod;
        $data->foto1_prod = $input['imagename'];
        $data->stok = $request->stok;
        $data->kategori = $request->kategori;
        $data->khas = $request->khas;
        $data->id_cus = $request->id_cus;
        $data->save();
        
        $info = "Berhasil Menambahkan Produk !";
        return view('admin.form', ['info'=>$info]);
    }
    public function getFormProduk(){
        $info = "";        
        return view('admin.form', ['info'=>$info]);
    }
   
    public function getOrdered(){
        $total = DB::table('transaksis')->where([['status',true]])->select('*');
        $transaksi =  DB::table('transaksis')
            ->join('users', 'users.id', '=', 'transaksis.id_cus')
            ->join('produks', 'produks.id', '=', 'transaksis.id_prod')            
            ->where([            
            ['transaksis.status','=',1],
            ])            
            ->select('transaksis.*','users.id', 'produks.harga_prod', 'produks.nama_prod', 'users.name', 'users.nohp','users.provinsi', 'users.kabupaten', 'users.kecamatan', 'users.desa','users.kodepos')
            ->get(); 

        $transaksi2 =  DB::table('transaksis')
        ->join('users', 'users.id', '=', 'transaksis.id_cus')
        ->join('produks', 'produks.id', '=', 'transaksis.id_prod')            
        ->where([        
        ['transaksis.status','=',1],
        ])            
        ->select('transaksis.*','transaksis.id', 'produks.harga_prod', 'produks.nama_prod', 'users.name', 'users.nohp','users.provinsi', 'users.kabupaten', 'users.kecamatan', 'users.desa','users.kodepos')->limit(1)
        ->get();

        $kurir = DB::table('totaltransaksis')
        ->join('kurirs', 'kurirs.id','=', 'totaltransaksis.id_kurir')
        ->where([['status',1]])
        ->select('kurirs.*', 'totaltransaksis.*', 'totaltransaksis.total','kurirs.namakurir')
        ->limit(1)
        ->get();

        $total = DB::table('totaltransaksis')->where([['status',1]])->select('total')->limit(1)->get();
        
        $info = '';
        $info = $info.'';                       
        return view('admin.list-produk', ['info'=>$info, 'transaksi2'=>$transaksi2, 'transaksi'=>$transaksi, 'total'=>$total, 'kurir'=>$kurir]);
    }
    public function postResiKurir(Request $request, $idcus){
        $data = DB::table('transaksis')->where([["id_cus","=",$idcus],["status","=",1]])->update(["no_resi"=>$request->no_resi, "status"=>false, "status_pengiriman"=>"Delivering"]);
        $info = "Pesanan Berhasil Dikonfirmasi !";
        $stok = 0;
        for($i=0; $i<count($data); $i++){
            $produks = DB::table('produks')->where("id","=",$request->id_prod)->get();            
            foreach($produks as $prod){            
                $stok = $prod->stok - 1;
            }
        }
        
        
        $produk = DB::table('produks')->where("id","=",$request->id_prod)->update(["stok"=>$stok]);
        return redirect('/admin/produk-order')->withInput(['info'=>$info]);
    }


    public function editProdukForm($id){
        $produk = $keranjang =  DB::table('produks')->where("id","=",$id)->get();
        $info = "";
        return view('admin.form-edit', ['produk'=>$produk, 'info'=>$info]);
    }

    
    public function editProduk(Request $request, $id){
        $data = DB::table('produks')->where([["id","=",$id]])->update(["nama_prod"=>$request->nama_prod, "desc_prod"=>$request->desc_prod, "harga_prod"=>$request->harga_prod, "stok"=>$request->stok, "Kategori"=>$request->kategori, "khas"=>$request->khas]);
        return redirect('/admin');
    }

    public function hapusProduk($id){
        DB::table('produks')->where('id', '=', $id)->delete();        
        return redirect('/admin')->with('info','barang terhapus !');
    }
}