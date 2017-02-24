@extends('layouts.tampilan')

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">Tambah Data Golongan</div>
                <div class="panel-body">
                <hr>
                    {!!Form::open(['url' => '/golongan', 'class' => 'form-horizontal']) !!}
						<div class="form-group">
                            <label for="kode_golongan" class="col-md-4 control-label">Kode Golongan</label>
							<div class="col-md-6">
                                <input id="kode_golongan" type="text" class="form-control" name="kode_golongan" value="{{ $kode }}" readonly autofocus>
                                 @if ($errors->has('kode_golongan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_golongan ') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						<div class="form-group">
                            <label for="nama_golongan" class="col-md-4 control-label">Nama Golongan</label>
                            <div class="col-md-6">
                                <input id="nama_golongan" type="text" class="form-control" name="nama_golongan" value="{{ old('nama_golongan') }}" autofocus>
                                 @if ($errors->has('nama_golongan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_golongan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group" >
                            <label for="besaran_uang" class="col-md-4 control-label">Besaran Uang</label>
                            <div class="col-md-6">
                                <input id="besaran_uang" type="number" class="form-control" name="besaran_uang" value="{{ old('besaran_uang') }}" autofocus>
                                @if ($errors->has('besaran_uang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('besaran_uang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						<div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Tambah
                                </button>
                            </div>
                        </div>
					{!! Form::close() !!}
	           </div>
	       </div>
	   </div>
    </div>
</div> 	
@endsection