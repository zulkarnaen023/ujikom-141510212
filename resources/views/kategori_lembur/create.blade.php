@extends('layouts.tampilan')

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">Tambah Data kategori_lembur</div>
                <div class="panel-body">
                <hr>
                    {!!Form::open(['url' => '/kategori_lembur', 'class' => 'form-horizontal']) !!}
						<div class="form-group">
                            <label for="kode_lembur" class="col-md-4 control-label">kode_lembur</label>
							<div class="col-md-6">
                                <input id="kode_lembur" type="text" class="form-control" name="kode_lembur" value="{{ $kode }}" readonly  autofocus>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="jabatan_id" class="col-md-4 control-label">Nama Jabatan</label>
                            <div class="col-md-6">
                                <select name="jabatan_id" class="form-control">
                            <option value="">--pilih--</option>
                                    @foreach($jabatan as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_jabatan }}</option>
                                    @endforeach
                                @if ($errors->has('jabatan_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jabatan_id') }}</strong>
                                    </span>
                                @endif

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="golongan_id" class="col-md-4 control-label">Nama Golongan</label>
                            <div class="col-md-6">
                                <select name="golongan_id" class="form-control" >
                                <option value="">--pilih--</option>
                                    @foreach($golongan as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_golongan }}</option>
                                    @endforeach
                                     @if ($errors->has('golongan_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('golongan_id') }}</strong>
                                    </span>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="besaran_uang" class="col-md-4 control-label">Besaran Uang</label>
                            <div class="col-md-6">
                                <input id="besaran_uang" type="number" class="form-control" name="besaran_uang" value="{{ old('besaran_uang') }}" autofocus>
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