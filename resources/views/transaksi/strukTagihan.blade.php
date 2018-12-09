
@extends('layouts.app')
@section('content')
<div class="container" style="margin-top: 70px;margin-bottom: 10px;">
    @if($transaksi)
        <div class="row">
        <div class="col col-sm-6"> 
            <table>            
                <tr>
                    <td><h3> Tagihan</h3></td>  
                </tr>
                <tr>
                    <td> Kepada Yth.</td>
                </tr>
                <tr>
                    <td> {{$pelanggan->name}}</td>
                </tr>
                <tr>          
                    <td> Mohon Lakukan pembayaran dengan berdasarkan tambahan nomor unik yang tertera di total pembayaran ke no Rekening : </td>
                </tr>
                <tr>
                    <td> Bank BRI</td>
                </tr>
                <tr>            
                    <td> A/N : PT. OL-ON Indonesia</td>
                </tr>
                <tr class="line">
                    <td> No Rek: 3347059999580</td>               
                </tr>
                <tr>
                    <td>Alamat Pengiriman :</td>
                </tr> 
                <tr>
                    <td> Provinsi 
                        @foreach ($transaksi2 as $data)
                            {{$data->alamat}}
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>Jasa Pengiriman :</td>
                </tr>      
                <tr class="line">
                    @foreach ($kurir as $item)                            
                        <td>{{$item->namakurir}}</td>
                    @endforeach
                </tr> 
                <tr>
                    <td>Nomor Ponsel :</td>
                </tr>
                <tr class="line">
                    @foreach ($transaksi2 as $item)                            
                        <td>{{$item->nohp}}</td>
                    @endforeach
                </tr>                
            </table>
        </div>
        <div class="col col-sm-6">                         
            <table class="table">
                <tr class="success">
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>                                        
                </tr>                 
                <p hidden="true">{{$i=1}}</p>                
                @foreach ($transaksi as $carts)                    
                <tr>                    
                    <td>{{$i++}}</td>
                    <td>{{$carts->nama_prod}}</td>
                    <td>{{$carts->harga_prod}}</td>                                    
                </tr>                
                @endforeach
                <tr> 
                    <td></td>
                    <td><b>Total yang Harus anda Bayar dengan berdasarkan 3 digit kode unik</b></td>
                    <td><span class="badge badge-warning">                                                                            
                            <b>
                                @foreach ($total as $totals)
                                    {{$totals->total}}
                                @endforeach
                                
                            </b>                                                                                                           
                        </span>
                    </td>                    
                </tr>                                
            </table>        
            <p class="line-full"><b>Harap segera melakukan pembayaran sebelum batas waktu 1 X 24 jam dari waktu pemesanan !</b></p>                
            @if($info)
                <div class="alert alert-info" role="alert"><span>{{$info}}</span></div>            
            @else
                <div><span></span></div>
            @endif 
           <form action="/bukti/bayar/{{Auth::user()->id}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Upload Bukti Pembayaran</label>
                    <input style="padding:0px;" type="file" name="image" class="form-control">
                    <p class="help-block">Silahkan pilih foto Bukti Pembayaran</p>
                </div>
                <div class="form-group">
                    <input type="hidden" name="id_cus" class="form-control" value="{{Auth::user()->id}}">
                    <button type="submit" class="btn btn-primary">Submit</button>            
                </div>
            </form>
        </div>                
        @else
            @if($statusPengiriman)
            <h2 text-align="center">Barang anda sedang dikirim</h2>
            <!--baris ketiga-->
            <div class="row">
                    <!--daftar produk-->
                    <div class="col col-sm-12">
                            <table class="table">
                                <tr class="success">
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Penerima</th>
                                    <th>Alamat</th>
                                    <th>No Hp</th> 
                                    <th>Foto Resi</th>
                                    <th>Nomor Resi</th>
                                    <th>Status</th>                                   
                                    <th>Action</th>
                                </tr>    
                                <p hidden="true">{{$i =1}}              
                                @foreach ($statusPengiriman as $item)                    
                                <tr>                                               
                                    <td>{{$i++}}</td>    
                                    <td>{{$item->nama_prod}}</td>    
                                    <td>{{$item->harga_prod}}</td>    
                                    <td>{{$item->qtt}}</td>   
                                    <td>{{$item->name}}</td>    
                                    <td>{{$item->alamat}}</td>  
                                    <td>{{$item->nohp}}</td>
                                    <td><img height="50px" width="50px" src="{{asset('img/resi/'.$item->foto_bukti)}}"></td>                         
                                    <td>{{$item->no_resi}}</td>
                                    <td>{{$item->status_pengiriman}}</td>
                                    <td>
                                        <form action="/produk/konfirmasi-sampai/{{$item->id_cus}}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" value="Delivered" class="form-control" type="text" name="sampai" id="sampai">
                                            <button style="margin-top:5px;" type="submit" class="btn btn-primary"><i class="fa fa-check"></i>Konfirmasi Sampai</button>
                                        </form>
                                    </td>                          
                                </tr>
                                @endforeach               
                            </table>            
                        </div>            
                    <!--akhir daftar produk-->
                </div>
                <!--akhir baris ketiga-->
            @else
                <h2>anda tidak mempunyai status transaksi !</h2>
            @endif
        @endif
    </div>                
</div>
@endsection

