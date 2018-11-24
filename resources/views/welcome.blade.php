@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <!--daftar produk-->
                <div class="panel" style="margin-bottom:50px;">
                    @foreach ($produk as $prod)
                    <div class="col col-sm-3 panel-heading">
                        <div class="panel-body">
                            <a href="#">
                                <img class="col-sm-11" src="{{asset('images/oleh3.jpg')}}">
                            </a>
                        </div>
                         <a href="localhost:8000/detailproduk/{{$prod->id}}">
                            <h4 class="harga-nama">{{$prod->harga_prod}}</h4>
                            <h4 class="harga-nama">{{$prod->nama_prod}}</h4>
                         </a>
                    </div>  
                    @endforeach          
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
