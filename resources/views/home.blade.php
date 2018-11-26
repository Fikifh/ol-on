@extends('layouts.app')

@section('content')

<!-- CONTAINER -->
<div class="container">
 <!-- baris pertama -->
<div class='row'>
        <div class='col-sm-12'>
            <img src="{{asset('images/logo.png')}}" class="col-sm-2 img-responsive"style="margin-top: 58px; margin-bottom: 10px;">
        </div>
</div>
<!-- akhir baris pertama -->
<!-- baris kedua -->
    <div class="row">
        <div class="col-sm-8 col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading"><span class="glyphicon glyphicon-star-empty"></span> Our Produk !</div>
                <div class="panel-body">
                <!-- bootstrap carousel -->
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="{{asset('images/logo.png')}}">
                            <div class="carousel-caption">
                              <h3>Rupa yang Unik</h3>
                              <p>Lorem ipsum dolor sit amet consectetur…
                              Lorem ipsum dolor sit amet consectetur…
                              Lorem ipsum dolor sit amet consectetur…
                              Lorem ipsum dolor sit amet consectetur…
                              Lorem ipsum dolor sit amet consectetur…
                              Lorem ipsum dolor sit amet consectetur…
                              </p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{asset('images/logo.png')}}">
                            <div class="carousel-caption">
                              <h3>Cita Rasa yang Khas</h3>
                              <p>Lorem ipsum dolor sit amet consectetur…
                              Lorem ipsum dolor sit amet consectetur…
                              Lorem ipsum dolor sit amet consectetur…
                              Lorem ipsum dolor sit amet consectetur…
                              Lorem ipsum dolor sit amet consectetur…
                              Lorem ipsum dolor sit amet consectetur…
                              </p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{asset('images/logo.png')}}">
                            <div class="carousel-caption">
                              <h3>Berbagai Daerah</h3>
                              <p>Lorem ipsum dolor sit amet consectetur…
                              Lorem ipsum dolor sit amet consectetur…
                              Lorem ipsum dolor sit amet consectetur…
                              Lorem ipsum dolor sit amet consectetur…
                              Lorem ipsum dolor sit amet consectetur…
                              Lorem ipsum dolor sit amet consectetur…
                              </p>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel controls -->
                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="carousel-control right" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
                <!-- end bootsrap carousel -->
                </div><!-- body panel pertama akhirnya -->
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
        <div class="panel panel-success">
                <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart"></span> Cart !</div>
                <div class="panel-body">
                    <table class="table">                        
                        <tr class="success">
                            <th>Barang </th>
                            <th>Jumlah </th>
                        </tr>
                        @foreach ($keranjang as $carts)  
                        <tr>
                            <td>{{$carts->nama_prod}}</td>
                            <td><span class="badge badge-success">{{$carts->qtt}}</span></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td class="success"></td>
                            <td class="success"><span class="label label-success">{{$count}}</span></td>
                        </tr>                        
                    </table>                    
                    <a href="{{url('keranjang/'.Auth::user()->id)}}"><button type="button" class="btn btn-success btn-sm"  >Chek Out </button>
                </div>
            </div>
        </div>
    </div>
<!-- akhir baris kedua -->
<!--baris ketiga-->
    <div class="row">
        <!--daftar produk-->
        <div class="panel" style="margin-bottom:50px;">
            @foreach ($produk as $prod)
            <div class="col col-sm-3 panel-heading" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="panel-body">
                    <a href="localhost:8000/detailproduk/{{$prod->id}}">
                        <img class="col-sm-11" src="{{asset('images/oleh3.jpg')}}">
                    </a>
                </div>                                
                <a href={{ url('detailproduk/'.$prod->id) }}>               
                    <h4 class="harga-nama">{{$prod->harga_prod}}</h4>
                    <h4 class="harga-nama">{{$prod->nama_prod}}</h4>                    
                </a>                                
            </div>  
            @endforeach          
        </div>       
        <!--akhir daftar produk-->
    </div>
<!--akhir baris ketiga-->
</div>
<!-- AKHIR DARI CONTAINER -->
@endsection
