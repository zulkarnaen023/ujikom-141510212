@extends('layouts.tampilan')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading">TAMBAH LEMBUR PEGAWAI</div>
				<div class="panel-body">
                {!! Form::open(['url'=>'lembur_pegawai']) !!}
					<div class="form-group{{ $errors->has('kode_lembur_id') ? ' has-error' : 'pesan' }}">
						{!! Form::label ('Kode Lembur Id', 'Kode Lembur Id:') !!}
						<select class="form-control" name="kode_lembur_id">
						<option value="">---Kode Lembur Id---</option>
							@foreach($kategori_lembur as $data)
							<option value="{!! $data->id!!}">{!! $data->kode_lembur!!} </option>
							@endforeach
						</select>
						@if ($errors->has('kode_lembur_id'))
							<span class="help-block">
				            	<strong>{{ $errors->first('kode_lembur_id') }}</strong>
				            </span>
				        @endif
					</div>
					<div class="form-group{{ $errors->has('golongan_id') ? ' has-error' : 'pesan' }}">
						{!! Form::label ('Nama Pegawai', ' Nama Pegawai:') !!}
						<select class="form-control" name="pegawai_id">
						<option value="">---Nama Pegawai---</option>
							@foreach($pegawai as $data)
							<option value="{!! $data->id!!}">{!! $data->user->name!!} </option>
							@endforeach
						</select>
						@if ($errors->has('pegawai_id'))
				                                    <span class="help-block">
				                                        <strong>{{ $errors->first('pegawai_id') }}</strong>
				                                    </span>
				        @endif
					</div>
					<div class="form-group{{ $errors->has('jumlah_jam') ? ' has-error' : 'pesan' }}">
						{!! Form::label ('Jumlah Jam', 'Jumlah Jam :') !!}
							<input type="text" name="jumlah_jam" class="form-control" required>
							@if ($errors->has('jumlah_jam'))
				                <span class="help-block">
				                <strong>{{ $errors->first('jumlah_jam') }}</strong>
								</span>
				            @endif
					</div>
					<div class="form-group">
                        {!! Form::submit('Save',['class'=>'btn btn-primary form control']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
