@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 70px;">
    <div class="row">                                                    
        <div class="produshade">
            <img src="{{asset('images/oleh4.jpg')}}" alt="Norway" style="width:100%">
            <div class="meta-prod">
                <p>Rp. {{$ProdDetail->harga_prod}}</p>
                <p>{{$ProdDetail->nama_prod}}</p>
            </div>
        </div>
        <div class="panel">
            <div class="panel-body">
                <b><p>Deskripsi Produk</p></b>
                <p text-align="justify">
                    {{$ProdDetail->desc_prod}}
                </p>
            </div>                                                    
        </div>
        <div class="btn btn-warning" style="margin-bottom:17px;">
            <a href={{ url('beli/'.$ProdDetail->id) }}><span class="glyphicon glyphicon-shopping-cart"> Beli</span></a>
        </div>
        <div class="btn btn-warning" style="margin-bottom:17px;">
            <a href={{ url('beli/'.$ProdDetail->id) }}><span class="glyphicon glyphicon-shopping-cart"> Keranjang</span></a>
        </div>
    </div>
    <!--akhir row-->
    </div>
</div>
@endsection