@extends('layouts.tampilan')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading">TAMBAH TUNJANGAN PEGAWAI</div>
				<div class="panel-body">
                {!! Form::open(['url'=>'tunjangan_pegawai']) !!}
                	<div class="form-group{{ $errors->has('kode_tunjangan_id') ? ' has-error' : '' }}">
						{!! Form::label ('Kode Tunjangan', ' Kode Tunjangan:') !!}
						<select class="form-control" name="kode_tunjangan_id">
						<option value="">---Kode Tunjangan---</option>
							@foreach($tun as $data)
							<option value="{!! $data->id!!}">{!! $data->kode_tunjangan!!} </option>
							@endforeach
						</select>
						@if ($errors->has('kode_tunjangan_id'))
				                                    <span class="help-block">
				                                        <strong>{{ $errors->first('kode_tunjangan_id') }}</strong>
				                                    </span>
				        @endif
					</div>

					<div class="form-group{{ $errors->has('pegawai_id') ? ' has-error' : '' }}">
						{!! Form::label ('Nama Pegawai', ' Nama Pegawai:') !!}
						<select class="form-control" name="pegawai_id">
						<option value="">---NIP--- || ---Nama Pegawai---</option>
							@foreach($peg as $data)
							<option value="{!! $data->id!!}">{!! $data->nip!!} || {!! $data->User->name!!} </option>
							@endforeach
						</select>
						@if (isset($error)) 
						<div>Maaf Tunjangan Tidak Terdaftar!!!</div>
						@endif
						@if ($errors->has('pegawai_id'))
				                                    <span class="help-block">
				                                        <strong>{{ $errors->first('pegawai_id') }}</strong>
				                                    </span>
				        @endif
					</div>
					<br>
					<div class="form-group">
                        {!! Form::submit('Save',['class'=>'btn btn-primary form control']) !!}
                        {!! Form::close() !!}
                    </div>
@endsection