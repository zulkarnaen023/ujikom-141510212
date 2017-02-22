@extends('layouts.tampilan')

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">Edit Data Golongan</div>
                <div class="panel-body">
				<hr>
				{!! Form::model($golongan, ['method' => 'PATCH', 'route' => ['golongan.update', $golongan->id], 'class' => 'form-horizontal']) !!}
					<div class="form-group{{ $errors->has('kode_golongan') ? ' has-error' : '' }}">
	                    <label for="kode_golongan" class="col-md-4 control-label">Kode Golongan</label>
						<div class="col-md-6">
	                        <input type="text" name="kode_golongan" class="form-control" value="{{ $golongan->kode_golongan }}" readonly>
	                    </div>
	                </div>
	                <div class="form-group{{ $errors->has('nama_golongan') ? ' has-error' : '' }}">
	                    <label for="nama_golongan" class="col-md-4 control-label">Nama Golongan</label>
						<div class="col-md-6">
	                        <input type="text" name="nama_golongan" class="form-control" value="{{ $golongan->nama_golongan }}">
	                    </div>
	                </div>
	                <div class="form-group{{ $errors->has('besaran_uang') ? ' has-error' : '' }}">
	                    <label for="besaran_uang" class="col-md-4 control-label">Besaran Uang</label>
						<div class="col-md-6">
	                        <input type="number" name="besaran_uang" class="form-control" value="{{ $golongan->besaran_uang }}">
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