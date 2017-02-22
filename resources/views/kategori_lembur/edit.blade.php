@extends('layouts.tampilan')

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">Edit Data Kategori Lembur</div>
                <div class="panel-body">
				<hr>
				{!! Form::model($kategori_lembur, ['method' => 'PATCH', 'route' => ['kategori_lembur.update', $kategori_lembur->id], 'class' => 'form-horizontal']) !!}
					<div class="form-group{{ $errors->has('kode_lembur') ? ' has-error' : '' }}">
	                    <label for="kode_lembur" class="col-md-4 control-label">Kode Jabatan</label>
						<div class="col-md-6">
	                        <input type="text" name="kode_lembur" class="form-control" value="{{ $kategori_lembur->kode_lembur }}" readonly>
	                    </div>
	                </div>
	                <div class="form-group{{ $errors->has('jabatan_id') ? ' has-error' : '' }}">
	                    <label for="jabatan_id" class="col-md-4 control-label">Nama Jabatan</label>
						<div class="col-md-6">
	                        <select name="jabatan_id" class="form-control">
                                @foreach($jabatan as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_jabatan }}</option>
                                @endforeach
                            </select>
	                    </div>
	                </div>
	                <div class="form-group{{ $errors->has('golongan_id') ? ' has-error' : '' }}">
	                    <label for="golongan_id" class="col-md-4 control-label">Nama Golongan</label>
						<div class="col-md-6">
	                        <select name="golongan_id" class="form-control">
                                @foreach($golongan as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_golongan }}</option>
                                @endforeach
                            </select>
	                    </div>
	                </div>
	                <div class="form-group{{ $errors->has('besaran_uang') ? ' has-error' : '' }}">
	                    <label for="besaran_uang" class="col-md-4 control-label">Besaran Uang</label>
						<div class="col-md-6">
	                        <input type="number" name="besaran_uang" class="form-control" value="{{ $kategori_lembur->besaran_uang }}">
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