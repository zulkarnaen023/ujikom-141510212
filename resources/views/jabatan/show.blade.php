@extends('layouts.tampilan')

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">Lihat Data jabatan</div>
                <div class="panel-body">
                <hr>
                    <form class="form-horizontal">
						<div class="form-group{{ $errors->has('kode_jabatan') ? ' has-error' : '' }}">
                            <label for="kode_jabatan" class="col-md-4 control-label">Kode jabatan</label>
							<div class="col-md-6">
                                <input id="kode_jabatan" type="text" class="form-control" name="kode_jabatan" value="{{ $jabatan->kode_jabatan }}" readonly required autofocus>
                            </div>
                        </div>
						<div class="form-group{{ $errors->has('nama_jabatan') ? ' has-error' : '' }}">
                            <label for="nama_jabatan" class="col-md-4 control-label">Nama jabatan</label>
                            <div class="col-md-6">
                                <input id="nama_jabatan" type="text" class="form-control" name="nama_jabatan" value="{{ $jabatan->nama_jabatan }}" readonly required autofocus>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('besaran_uang') ? ' has-error' : '' }}">
                            <label for="besaran_uang" class="col-md-4 control-label">Besaran Uang</label>
                            <div class="col-md-6">
                                <input id="besaran_uang" type="text" class="form-control" name="besaran_uang" value="<?php echo 'Rp. '.number_format($jabatan->besaran_uang, 2, ",", "."); ?>" readonly required autofocus>
                            </div>
                        </div>
						<div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="/jabatan" type="submit" class="btn btn-primary">
                                    Kembali
                                </a>
                            </div>
                        </div>
					</form>
	           </div>
	       </div>
	   </div>
    </div>
</div> 	
@endsection