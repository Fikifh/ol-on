@extends('layouts.dashboard')
@section('page_heading','Dashboard')
@section('section')
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
            <!-- /.row -->
            <div class="col-sm-12">
            <div class="row">
                                
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$total}}</div>
                                    <div>New Orders!</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('/admin/produk-order')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>                
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                
                @section ('pane2_panel_title', 'Our Product')
                @section ('pane2_panel_body')                    
                    <!-- /.panel -->                    
                    <!--daftar produk-->
                    <div class="prod panel">
                        @foreach ($produk as $prod)
                        <div class="col-lg-3 panel-heading" style="width: 250px;
                        float: left; height:320px;
                        border: 1px solid rgba(0, 0, 0, 0.2);                      
                        text-align: center;
                        margin:15px; 
                        background-color: white; ">                    
                            <div class="col-xs-12">                                        
                                    <img style="width:100%; height:160px;" class="col-sm-11 prod-gbr" src="{{asset('img/'.$prod->foto1_prod) }}">                                        
                            </div> 
                            <div class="col-xs-12">                                                                                                                                                   
                                    <h4 class="col-xs-12" style="text-align:center" class="harga">{{$prod->harga_prod}}</h4>
                                    <h4 class="col-xs-12" style="text-align:center" class="harga-nama">{{$prod->nama_prod}}</h4>                                                                                                           
                            </div>
                            <div class="col-xs-12">
                                <a class="col-xs-6" href="{{url('/admin/produk-edit/'.$prod->id)}}"><button class="btn btn-info">Edit</button></a>
                                <a onclick="return tanya();" class="col-xs-6" href="{{url('/admin/produk-hapus/'.$prod->id)}}"><button class="btn btn-danger">Hapus</button></a>
                            </div>
                        </div>  
                        @endforeach          
                    </div>       
                    <!--akhir daftar produk-->
            

              
                    {{-- <ul class="timeline">
                        
                    </ul> --}}
                        
                        <!-- /.panel-body -->
                   
                    <!-- /.panel -->
                @endsection
                @include('admin.widgets.panel', array('header'=>true, 'as'=>'pane2'))
                </div>
                <!-- /.col-lg-8 -->
                
            
@stop
