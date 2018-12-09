@extends ('layouts.dashboard')
@section('page_heading','Edit Produk')

@section('section')
<div class="col-sm-12">
<div class="row">
    <div class="col-md-6 col-xs-offset-3" style="margin-bottom:20px;">     
            @foreach ($produk as $item)    
            <form role="form" enctype="multipart/form-data" action="{{url('/admin/produk-edit/'.$item->id)}}" method="POST">
                {{ csrf_field() }}
                @if($info)
                    <div class="alert alert-info" role="alert"><span>{{$info}}</span></div>            
                @else
                    <div><span></span></div>
                @endif  
                           
                    <div class="form-group">
                        <label>Nama Produk</label>
                    <input type="text" value="{{$item->nama_prod}}" name="nama_prod" class="form-control">
                        <p class="help-block">Silahkan masukan nama produk</p>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" value="{{$item->harga_prod}}" name="harga_prod" class="form-control" placeholder="Harga">
                    </div>                        
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="desc_prod" value="{{$item->desc_prod}} class="form-control" rows="3"></textarea>
                    </div> 
                    <div class="form-group">
                        <label>Stok</label>
                        <input name="stok" value="{{$item->stok}}" class="form-control" placeholder="Stok">                
                    </div> 
                    <div class="form-group">
                        <label>Kategori</label>
                        <input name="kategori" value="{{$item->Kategori}}" class="form-control" placeholder="Kategori">                
                    </div> 
                    <div class="form-group">
                            <label>Produk Khas</label>
                            <input name="khas" value="{{$item->khas}}" class="form-control" placeholder="Produk Khas">                
                    </div>                  
                    <input type="hidden" name="id_cus" class="form-control" value="{{$item->id}}">
                    @endforeach  
                    <button type="submit" class="btn btn-primary">Update</button>            
                </form>
    </div>    
</div>
</div>
@stop