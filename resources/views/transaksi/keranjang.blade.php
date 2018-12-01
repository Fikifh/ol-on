
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
<div class="container" style="margin-top: 70px;margin-bottom: 10px;">
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
    <form action="{{url('bayar/'.Auth::user()->id)}}" method="post">     
        {{csrf_field()}}
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="namapenerima">Nama Penerima</label>
            <input name="namapenerima" value="{{$pelanggan->name}}" type="text" class="form-control" id="namapenerima" placeholder="Nama Penerima">
          </div>
          <div class="form-group col-md-4">
            <label for="nohp">No Handphone</label>
            <input name="nohp" value="{{$pelanggan->nohp}}" type="phone-number" class="form-control" id="nohp" placeholder="No Handphone">
          </div>
          <div class="form-group col-md-4">
            <label for="alamat">Alamat</label>
            <input name="alamat" value="{{$pelanggan->alamat}}"  type="address" class="form-control" id="alamat" placeholder="Alamat">
          </div>
        </div>        
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputCity">Kota/Kab.</label>
            <input name="kota" type="text" class="form-control" id="inputCity">
          </div>
          <div class="form-group col-md-4">
            <label for="prov">Provinsi</label>
            <select name="prov" id="prov" class="form-control">
              <option selected>Choose...</option>
              <option>Jawa Barat</option>
              <option>Jawa Tengah</option>
              <option>Jawa Timur</option>
              <option>Kalimantan Timur</option>
              <option>Sulawesi</option>
              <option>Banka Belitung</option>
              <option>Aceh</option>
              <option>Maluku</option>
              <option>NTT</option>
              <option>NTB</option>
              <option>Papua</option>                           
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputZip">Kode Pos</label>
            <input name="kodepos" value="{{$pelanggan->kodepos}}" type="text" class="form-control" id="inputZip">
          </div>
          <div class="form-group col-md-2">
            <label for="kurir">Kurir</label>
            <select name="kurir" id="kurir" class="form-control">
              <option selected>Choose...</option>
              @foreach($kurir as $paket)
              <option value="{{$paket->id}}">{{$paket->namakurir}}</option>              
              @endforeach
            </select>
          </div>
        </div>           
        <button type="submit" class="col-md-1 btn btn-primary glyphicon glyphicon-shopping-cart"> Bayar</button>
      </form> 
</div>
@endsection

