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
        @if (Auth::guest())
            <div class="btn btn-warning" style="margin-bottom:17px;">           
                <a href={{ url('login') }}><span class="glyphicon glyphicon-shopping-cart"> beli </span></a>
            </div>
        @else
        <div class="col">
            <form method="POST" class="beli" action="{{ url('beli/'.$ProdDetail->id.'/'.Auth::user()->id) }}">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-warning">
                   <i class="glyphicon glyphicon-shopping-cart"></i> Beli                    
                </button>
            </form>
            <form class="beli" method="POST" action="{{ url('keranjang/'.$ProdDetail->id.'/'.Auth::user()->id) }}">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">
                   <i class="glyphicon glyphicon-shopping-cart"></i> Keranjang                    
                </button>
            </form>
        </div>
        @endif
    </div>
    <!--akhir row-->
    </div>
</div>
@endsection