@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 70px;">
    <div class="row">                                                    
        <div class="col col-md-3 bungkus-produk">
            <img src="{{asset('images/oleh4.jpg')}}" alt="Norway" style="width:100%">  
            <div class="meta-prod">
                <p>Rp. {{$ProdDetail->harga_prod}}</p>
                <p>{{$ProdDetail->nama_prod}}</p>
            </div>
        </div>  
        <div class="col col-md-9 bg-info">
            <form>
                <div class="form-group">
                    <label for="NamaPenerima">Nama Penerima</label>
                    <input type="name" class="form-control" id="NamaPenerima" name="nama" aria-describedby="namaHelp"  placeholder="Masukan Nama Penerima">
                    <small id="namaHelp" class="form-text text-muted">Masukan Nama yang akan menerima {{$ProdDetail->nama_prod}}.</small>
                </div>
                <div class="form-group">
                    <label for="alamatPenerima">Alamat Penerima</label>
                    <input type="address" class="form-control" id="alamatPenerima" name="alamat" aria-describedby="alamatHelp"  placeholder="Masukan Nama Penerima">
                    <small id="alamatHelp" class="form-text text-muted">Masukan Alamat yang akan menerima {{$ProdDetail->nama_prod}}.</small>
                </div>
                <div class="form-group">
                    <label for="alamatPenerima">No HP</label>
                    <input type="text" class="form-control" id="kode pos" name="nohp" placeholder="Masukan Nomor HP">
                </div>
                <div class="form-group">
                    <label for="alamatPenerima">Kode Pos</label>
                    <input type="text" class="form-control" id="kode pos" name="kodepos" placeholder="Masukan Kode Pos">
                </div>                                          
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <!--akhir row-->
    </div>
</div>
@endsection