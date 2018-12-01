
@extends('layouts.app')
@section('content')
<div class="container" style="margin-top: 70px;margin-bottom: 10px;">
    <div class="row">
        <div class="col col-sm-12">
            <h3>Struk Tagihan</h3>
            <table class="table">
                <tr class="success">
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>                    
                </tr>                 
                <p hidden="true">{{$i=1}}</p>                
                @foreach ($keranjang as $carts)                    
                <tr>                    
                    <td>{{$i++}}</td>
                    <td>{{$carts->nama_prod}}</td>
                    <td>{{$carts->harga_prod}}</td>
                    <td><span class="badge badge-success">{{$carts->qtt}}</span></td>                     
                </tr>                
                @endforeach
                <tr> 
                    <td><b>Total yang Harus anda Bayar</b></td>
                    <td></td>
                    <td></td>
                    <td><span class="badge badge-warning"><b>{{$count}}</b></span></td>                                       
                    <td></td>
                </tr>                
            </table>            
        </div>        
        
    </div>     
    <div class="fg">
        
    </div>
</div>
@endsection

