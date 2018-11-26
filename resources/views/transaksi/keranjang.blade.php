
@extends('layouts.app')
@section('content')

<script>
    function tanya(){
        var pl = confirm('Yakin Ingin Menghapus ?');
        if(pl){
            return true;
        }else{          
            return false;
        }
    }
</script>
<div class="container" style="margin-top: 70px;">
    <div class="row">
        <div class="col col-sm-12">
            <table class="table">
                <tr class="success">
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                </tr>                 
                <p hidden="true">{{$i=1}}</p>
                @foreach ($keranjang as $carts)                    
                <tr>                    
                    <td>{{$i++}}</td>
                    <td>{{$carts->nama_prod}}</td>
                    <td>{{$carts->harga_prod}}</td>
                    <td><span class="badge badge-success">{{$carts->qtt}}</span></td>
                    <td>
                        <a onclick="return tanya();" href="{{url('hapusbarang/'.$carts->id.'/'.Auth::user()->id)}}"><button class="btn btn-primary fa fa-btn fa-trash"></button></a>
                    </td> 
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
</div>
@endsection

