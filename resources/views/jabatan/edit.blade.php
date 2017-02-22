@extends('layouts.tampilan')

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">Edit Data jabatan</div>
                <div class="panel-body">
				<hr>
				{!! Form::model($jabatan, ['method' => 'PATCH', 'route' => ['jabatan.update', $jabatan->id], 'class' => 'form-horizontal']) !!}
					<div class="form-group{{ $errors->has('kode_jabatan') ? ' has-error' : '' }}">
	                    <label for="kode_jabatan" class="col-md-4 control-label">Kode jabatan</label>
						<div class="col-md-6">
	                        <input type="text" name="kode_jabatan" class="form-control" value="{{ $jabatan->kode_jabatan }}" readonly>
	                    </div>
	                </div>
	                <div class="form-group{{ $errors->has('nama_jabatan') ? ' has-error' : '' }}">
	                    <label for="nama_jabatan" class="col-md-4 control-label">Nama jabatan</label>
						<div class="col-md-6">
	                        <input type="text" name="nama_jabatan" class="form-control" value="{{ $jabatan->nama_jabatan }}">
	                    </div>
	                </div>
	                <div class="form-group{{ $errors->has('besaran_uang') ? ' has-error' : '' }}">
	                    <label for="besaran_uang" class="col-md-4 control-label">Besaran Uang</label>
						<div class="col-md-6">
	                        <input type="number" name="besaran_uang" class="form-control" value="{{ $jabatan->besaran_uang }}">
	                    </div>
	                </div>
					<div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
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