@extends('layouts.app')

@section('content')

<!-- CONTAINER -->
<div class="container" style="margin-top: 60px">

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
                            <img class="=slide" src="{{asset('images/logo.png')}}">
                            <div class="carousel-caption">
                              <h3>Rupa yang Unik</h3>                                 
                            </div>
                        </div>
                        <div class="item">
                            <img class="=slide" src="{{asset('images/oleh3.jpg')}}">
                            <div class="carousel-caption">
                              <h3>Cita Rasa yang Khas</h3>                              
                            </div>
                        </div>
                        <div class="item">
                            <img class="=slide" src="{{asset('images/oleh4.jpg')}}">
                            <div class="carousel-caption">
                              <h3>Berbagai Daerah</h3>                              
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
                        <tr>
                            <td></td>
                            <td><span class="badge badge-success"></span></td>
                        </tr>                        
                        <tr>
                            <td class="success"></td>
                            <td class="success"><span class="label label-success">0</span></td>
                        </tr>                        
                    </table>                    
                    <a href="{{url('login')}}"><button type="button" class="btn btn-success btn-sm"  >Chek Out </button>
                </div>
            </div>
        </div>
    </div>
<!-- akhir baris kedua -->
<!--baris ketiga-->
<div class="row">
        <!--daftar produk-->
        <div class="prod panel" style="margin-bottom:50px;">
            @foreach ($produk as $prod)
            <div class="prod-box col col-sm-3 panel-heading">                    
                <div class="gambar-prod">
                    <a href="{{ url('detailproduk/'.$prod->id) }}">
                        <img style="width:100%; height:160px;" class="col-sm-11 prod-gbr" src="{{asset('img/'.$prod->foto1_prod) }}">
                    </a>  
                </div> 
                <div class="prod-title">                                                                       
                    <a href={{ url('detailproduk/'.$prod->id) }}>                                      
                        <h4 style="text-decoration:none" class="harga">{{$prod->harga_prod}}</h4>
                        <h4 style="text-decoration:none" class="harga-nama">{{$prod->nama_prod}}</h4>                                            
                    </a>                                
                </div>
            </div>  
            @endforeach          
        </div>       
        <!--akhir daftar produk-->
    </div>
<!--akhir baris ketiga-->
</div>
<!-- AKHIR DARI CONTAINER -->
@endsection
