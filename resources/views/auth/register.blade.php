@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 65px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no-hp" class="col-md-4 control-label">No HP</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nohp" value="{{ old('nohp') }}">
                                @if ($errors->has('nohp'))
                                   <span class="help-block">
                                      <strong>{{ $errors->first('nohp') }}</strong>
                                   </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="provinsi" class="col-md-4 control-label">Provinsi</label>

                            <div class="col-md-6">
                                <select class="form-control" name="provinsi" value="{{ old('alamat') }}">
                                    <option>Pilih Provinsi</option>
                                    @foreach ($provinsi as $provinsis)                                                                            
                                    <option value="{{$provinsis->name}}" >{{$provinsis->name}}</option>
                                    @endforeach
                                    @if ($errors->has('provinsi'))
                                    <span class="help-block">
                                      <strong>{{ $errors->first('provinsi') }}</strong>
                                    </span>
                                    @endif
                                </select>                                
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="kabupaten" class="col-md-4 control-label">kabupaten</label>    
                                <div class="col-md-6">
                                    <select class="form-control" name="kabupaten" value="{{ old('alamat') }}">
                                        <option>Pilih kabupaten</option>
                                        @foreach ($kabupaten as $kabupatens)                                                                                    
                                            <option value="{{$kabupatens->name}}" >{{$kabupatens->name}}</option>
                                        @endforeach
                                        @if ($errors->has('kabupaten'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('kabupaten') }}</strong>
                                        </span>
                                        @endif
                                    </select>                                
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kecamatan" class="col-md-4 control-label">Kecamatan</label>    
                                <div class="col-md-6">
                                    <select class="form-control" name="kecamatan" value="{{ old('alamat') }}">
                                        <option>Pilih kecamatan</option>
                                        @foreach ($kecamatan as $kecamatans)                                            
                                            <option value="{{$kecamatans->name}}" >{{$kecamatans->name}}</option>                                            
                                        @endforeach
                                        @if ($errors->has('kecamatan'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('kecamatan') }}</strong>
                                        </span>
                                        @endif
                                    </select>                                
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="desa" class="col-md-4 control-label">Desa/Kelurahan</label>    
                                <div class="col-md-6">
                                    <select class="form-control" name="desa" value="{{ old('alamat') }}">
                                        <option>Pilih desa</option>
                                        @foreach ($desa as $desas)                                                                                    
                                            <option value="{{$desas->name}}" >{{$desas->name}}</option> 
                                        @endforeach
                                        @if ($errors->has('desa'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('desa') }}</strong>
                                        </span>
                                        @endif
                                    </select>                                
                                </div>
                            </div>
                                              
                        <div class="form-group">
                            <label for="kodepos" class="col-md-4 control-label">Kodepos</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="kodepos" value="{{ old('kodepos') }}">
                                @if ($errors->has('kodepos'))
                                   <span class="help-block">
                                      <strong>{{ $errors->first('kodepos') }}</strong>
                                   </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
