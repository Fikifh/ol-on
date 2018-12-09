@extends ('layouts.dashboard')
@section('page_heading','Tambahkan Produk')

@section('section')
<div class="col-sm-12">
<div class="row">
    <div class="col-md-6 col-xs-offset-3" style="margin-bottom:20px;">        
    <form role="form" enctype="multipart/form-data" action="{{url('admin/produk')}}" method="POST">
        {{ csrf_field() }}
        @if($info)
            <div class="alert alert-info" role="alert"><span>{{$info}}</span></div>            
        @else
            <div><span></span></div>
        @endif  
            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nama_prod" class="form-control">
                <p class="help-block">Silahkan masukan nama produk</p>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga_prod" class="form-control" placeholder="Harga">
            </div>            
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="image" id="image">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="desc_prod" class="form-control" rows="3"></textarea>
            </div> 
            <div class="form-group">
                <label>Stok</label>
                <input name="stok" class="form-control" placeholder="Stok">                
            </div> 
            <div class="form-group">
                <label>Kategori</label>
                <input name="kategori" class="form-control" placeholder="Kategori">                
            </div> 
            <div class="form-group">
                    <label>Produk Khas</label>
                    <input name="khas" class="form-control" placeholder="Produk Khas">                
            </div>            
            <input type="hidden" name="id_cus" class="form-control" value="{{Auth::user()->id}}">
            <button type="submit" class="btn btn-primary">Submit Button</button>            
        </form>
    </div>    
</div>
</div>
@stop