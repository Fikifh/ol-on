@extends ('layouts.dashboard')
@section('page_heading','Daftar Produk Dipesan')

@section('section')
<div class="col-sm-12">
<div class="row">
    @if($info)
        <div class="alert alert-info" role="alert"><span>{{$info}}</span></div>            
    @else
        <div><span></span></div>
    @endif
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
                        <th>Bukti Bayar</th>
                        <th>Catatan</th>
                        <th>Action</th>
                    </tr>    
                    <p hidden="true">{{$i =1}}              
                    @foreach ($transaksi as $item)                    
                    <tr>                                               
                        <td>{{$i++}}</td>    
                        <td>{{$item->nama_prod}}</td>    
                        <td>{{$item->harga_prod}}</td>    
                        <td>{{$item->qtt}}</td>   
                        <td>{{$item->name}}</td>    
                        <td>{{$item->alamat}}</td>  
                        <td>{{$item->nohp}}</td>
                        <td><img height="50px" width="50px" src="{{asset('img/resi/'.$item->foto_bukti)}}"></td>                         
                        <td>{{$item->catatan}}</td>
                        <td>
                            <form action="/admin/resi/kurir/{{$item->id_cus}}" method="post">
                                {{csrf_field()}}
                                <input placeholder="Nomor Resi Kurir" class="form-control" type="text" name="no_resi" id="no_resi">
                                <input type="hidden" class="form-control" type="text" value="{{$item->catatan}}" name="id_prod" id="id_prod">
                                <button style="margin-top:5px;" type="submit" class="btn btn-primary"><i class="fa fa-check"></i>Submit</button>
                            </form>
                        </td>                          
                    </tr>
                    @endforeach               
                </table>            
            </div>            
        <!--akhir daftar produk-->
    </div>
    <!--akhir baris ketiga-->

</div>
</div>
@stop