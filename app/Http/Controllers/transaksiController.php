<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Transaksi;
use App\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\TotalTransc;
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
        foreach ($keranjang as $carts){
            $jumlah = $carts->harga_prod * $carts->qtt;
            $count = $count+$jumlah;
            $prod = $carts->nama_prod;
            $data = new Transaksi();
            $data->id_cus = $idcus;
            $data->id_prod = $carts->idprod;                
            $data->namapenerima = $req->namapenerima;
            $data->nohp = $req->nohp;
            $data->alamat = $req->alamat;            
            $data->id_paket = $req->kurir;
            $data->status = 1;
            $data->qtt = 1;
            $data->harga_satuan = $jumlah;
            $data->catatan = $req->catatan;
            $data->save();                    
        }
        
        $total = DB::table('transaksis')->where([['id_cus',$idcus],['status',1]])->sum('harga_satuan');;
        $count2 =$total+rand(500, 900);
        foreach($keranjang as $total){
            $jumlah = $total->harga_prod * $total->qtt;
            //$count2 = $count2+$jumlah;
            $status = 1;
            //masukan ke total
            $total = new  TotalTransc();
            $total->id_cus = $idcus;
            $total->total = $count2;
            $total->status = $status;
            $total->id_kurir = $req->kurir;
            $total->save();
        }  

        DB::table('carts')->where('idcus','=',$idcus)->delete();
        $transaksi = DB::table('transaksis')->where('id_cus','=',$idcus,'status','=',1)->select('transaksis.*');
        
        return redirect('struk/'.$idcus);
    }
    public function getStruk($idcus){
        $transaksi =  DB::table('transaksis')
            ->join('users', 'users.id', '=', 'transaksis.id_cus')
            ->join('produks', 'produks.id', '=', 'transaksis.id_prod')            
            ->where([
            ['transaksis.id_cus','=',$idcus],
            ['transaksis.status','=',1],
            ])            
            ->select('transaksis.*','transaksis.id', 'produks.harga_prod', 'produks.nama_prod', 'users.name', 'users.nohp','users.provinsi', 'users.kabupaten', 'users.kecamatan', 'users.desa','users.kodepos')
            ->get(); 
        $statusPengiriman =  DB::table('transaksis')
        ->join('users', 'users.id', '=', 'transaksis.id_cus')
        ->join('produks', 'produks.id', '=', 'transaksis.id_prod')            
        ->where([
        ['transaksis.id_cus','=',$idcus],
        ['transaksis.status_pengiriman','=',"Delivering"],
        ])            
        ->select('transaksis.*','transaksis.id', 'produks.harga_prod', 'produks.nama_prod', 'users.name', 'users.nohp','users.provinsi', 'users.kabupaten', 'users.kecamatan', 'users.desa','users.kodepos')
        ->get(); 

        $transaksi2 =  DB::table('transaksis')
        ->join('users', 'users.id', '=', 'transaksis.id_cus')
        ->join('produks', 'produks.id', '=', 'transaksis.id_prod')            
        ->where([
        ['transaksis.id_cus','=',$idcus],
        ['transaksis.status','=',1],
        ])            
        ->select('transaksis.*','transaksis.id', 'produks.harga_prod', 'produks.nama_prod', 'users.name', 'users.nohp','users.provinsi', 'users.kabupaten', 'users.kecamatan', 'users.desa','users.kodepos')->limit(1)
        ->get();

        $idtransc = 0;
        $idkurir = 0;
        foreach($transaksi as $total){
            $idtransc = $total->id;
            $idkurir = $total->id_paket;            
        }          
        $kurir = DB::table('totaltransaksis')
        ->join('kurirs', 'kurirs.id','=', 'totaltransaksis.id_kurir')
        ->where([['id_cus',$idcus],['status',1],['id_kurir', $idkurir]])
        ->select('kurirs.*', 'totaltransaksis.*', 'totaltransaksis.total','kurirs.namakurir')
        ->limit(1)
        ->get();

        $total = DB::table('totaltransaksis')->where([['id_cus',$idcus],['status',1]])->select('total')->limit(1)->get();//DB::table('totaltransaksis')->where([['id_cus',$idcus],['status',1]]);
        
        $info = '';
        $info = $info.'';               
        $pelanggan = User::where('id', $idcus)->first();
        //return response()->json([$count, $idcus, $idtransc, 200]);
        return view('transaksi.strukTagihan', ['info'=>$info, 'statusPengiriman'=>$statusPengiriman, 'transaksi2'=>$transaksi2, 'transaksi'=>$transaksi, 'total'=>$total, 'pelanggan'=>$pelanggan, 'kurir'=>$kurir]);    
    }
    public function uploadBukti(Request $request, $idcus){
        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/img/resi');
        $image->move($destinationPath, $input['imagename']);
        $data = DB::table('transaksis')->where("id_cus","=",$idcus)->update(["foto_bukti"=>$input['imagename']]);        
        
        $transaksi =  DB::table('transaksis')
            ->join('users', 'users.id', '=', 'transaksis.id_cus')
            ->join('produks', 'produks.id', '=', 'transaksis.id_prod')            
            ->where([
            ['transaksis.id_cus','=',$idcus],
            ['transaksis.status','=',1],
            ])            
            ->select('transaksis.*','transaksis.id', 'produks.harga_prod', 'produks.nama_prod', 'users.name', 'users.nohp','users.provinsi', 'users.kabupaten', 'users.kecamatan', 'users.desa','users.kodepos')
            ->get(); 

        $transaksi2 =  DB::table('transaksis')
        ->join('users', 'users.id', '=', 'transaksis.id_cus')
        ->join('produks', 'produks.id', '=', 'transaksis.id_prod')            
        ->where([
        ['transaksis.id_cus','=',$idcus],
        ['transaksis.status','=',1],
        ])            
        ->select('transaksis.*','transaksis.id', 'produks.harga_prod', 'produks.nama_prod', 'users.name', 'users.nohp','users.provinsi', 'users.kabupaten', 'users.kecamatan', 'users.desa','users.kodepos')->limit(1)
        ->get();

        $idtransc = 0;
        $idkurir = 0;
        foreach($transaksi as $total){
            $idtransc = $total->id;
            $idkurir = $total->id_paket;            
        }          
        $kurir = DB::table('totaltransaksis')
        ->join('kurirs', 'kurirs.id','=', 'totaltransaksis.id_kurir')
        ->where([['id_cus',$idcus],['status',1],['id_kurir', $idkurir]])
        ->select('kurirs.*', 'totaltransaksis.*', 'totaltransaksis.total','kurirs.namakurir')
        ->limit(1)
        ->get();

        $total = DB::table('totaltransaksis')->where([['id_cus',$idcus],['status',1]])->select('total')->limit(1)->get();//DB::table('totaltransaksis')->where([['id_cus',$idcus],['status',1]]);
        
        $info = 'Upload Resi Berhasil !';
        $info = $info.'';               
        $pelanggan = User::where('id', $idcus)->first();
        //return response()->json([$count, $idcus, $idtransc, 200]);
        return view('transaksi.strukTagihan', ['info'=>$info, 'transaksi2'=>$transaksi2, 'transaksi'=>$transaksi, 'total'=>$total, 'pelanggan'=>$pelanggan, 'kurir'=>$kurir]);
    }
    
    
    public function getStatusOrder(){

        $statusPengiriman =  DB::table('transaksis')
            ->join('users', 'users.id', '=', 'transaksis.id_cus')
            ->join('produks', 'produks.id', '=', 'transaksis.id_prod')            
            ->where([
            ['transaksis.id_cus','=',$idcus],
            ['transaksis.status_pengiriman','=',"Delivering"],
            ])            
            ->select('transaksis.*','transaksis.id', 'produks.harga_prod', 'produks.nama_prod', 'users.name', 'users.nohp','users.provinsi', 'users.kabupaten', 'users.kecamatan', 'users.desa','users.kodepos')
            ->get(); 
        
        return view('transaksi.strukTagihan', ['statusPengiriman'=>$statusPengiriman]);
    }


    public function konfirmSampai(Request $request, $idcus){        
            $data = DB::table('transaksis')->where("id_cus","=",$idcus)->update(["status_pengiriman"=>"Delivered"]);
            $info = "Pesanan Berhasil Dikonfirmasi !";
            
            return redirect('struk/'.$idcus)->withInput(['info'=>$info]);        
    }
}
       