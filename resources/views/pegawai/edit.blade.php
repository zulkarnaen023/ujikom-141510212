@extends('layouts.tampilan')
@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3><center><font face="Maiandra GD" color="white">Edit Data pegawai</font></h3></div></center>
                <div class="panel-body">
				<hr>
				{!! Form::model($pegawai, ['class' => 'form-horizontal',  'enctype' => 'multipart/form-data', 'method' => 'PATCH', 'route' => ['pegawai.update', $pegawai->id], 'files' => true]) !!}

					<div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
	                    <label for="nip" class="col-md-4 control-label">nip</label>
						<div class="col-md-6">
	                        <input type="text" name="nip" class="form-control" value="{{ $pegawai->nip }}" readonly>
	                    </div>
	                </div>
	                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                    <label for="name" class="col-md-4 control-label">Nama pegawai</label>
						<div class="col-md-6">
	                        <input type="text" name="name" class="form-control" value="{{ $pegawai->User->name }}" readonly>
	                    </div>
	                </div>
	                <div class="form-group{{ $errors->has('kode_jabatan') ? ' has-error' : '' }}">
	                    <label for="kode_jabatan" class="col-md-4 control-label">Nama jabatan</label>
						<div class="col-md-6">
	                        <select name="jabatan_id" class="form-control">
                                @foreach($jabatan as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_jabatan }}</option>
                                @endforeach
                            </select>
	                    </div>
	                </div>
	                <div class="form-group{{ $errors->has('kode_golongan') ? ' has-error' : '' }}">
	                    <label for="golongan_id" class="col-md-4 control-label">Nama golongan</label>
						<div class="col-md-6">
	                        <select name="golongan_id" class="form-control">
                                @foreach($golongan as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_golongan }}</option>
                                @endforeach
                            </select>
	                    </div>
	                </div>
	                <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                        <label for="photo" class="col-md-4 control-label">photo</label>
                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control" name="photo" value="{{ old('photo') }}">
                            </div>
                        </div>
					<div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
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