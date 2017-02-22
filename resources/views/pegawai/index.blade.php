@extends('layouts.tampilan')

@section('content')
<div class="flex-center position-ref full-height">
	<div class="container">
		<h2>Data Pegawai</h2>
		<hr>
		<a href="{{ url('/pegawai/create') }}" class="btn btn-success">Tambah Data</a>
		<hr>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr class="success">
					<th><center>No</center></th>
					<th><center>Nip</center></th>
					<th><center>Nama Pegawai</center></th>
					<th><center>Nama Jabatan</center></th>
					<th><center>Nama Golongan</center></th>
					<th><center>Photo</center></th>
					<th colspan="3"><center>Action</center></th>
				</tr>
			</thead>
			<tbody>
			<?php
				$no = 1;
			?>
				@foreach($pegawai as $data)
					<tr>
						<td><center>{{ $no++ }}</center></td>
						<td>{{ $data->nip }}</td>
						<td>{{ $data->User->name }}</td>
						<td>{{ $data->Jabatan->nama_jabatan }}</td>
						<td>{{ $data->Golongan->nama_golongan }}</td>
						<td>
							<center>
								<img src="{{asset('/image/'.$data->photo)}}" height="100px" width="100px">
							</center>
						</td>
						<td><center><a href="{{ url('pegawai', $data->id) }}" class="btn btn-primary">Lihat</a></center></td>
						<td><center><a href="{{ route('pegawai.edit', $data->id) }}" class="btn btn-warning">Ubah</a></center></td>
						<td><center>
							{!! Form::open(['method' => 'DELETE', 'route' => ['pegawai.destroy', $data->id]]) !!}
							{!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
							{!! Form::close() !!}
						</center></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection