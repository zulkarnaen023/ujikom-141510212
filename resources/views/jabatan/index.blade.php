@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
	<div class="container">
		<h2>Data jabatan</h2>
		<hr>
		<a href="{{ url('/jabatan/create') }}" class="btn btn-success">Tambah Data</a>
		<hr>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr class="success">
					<th><center>No</center></th>
					<th><center>Kode jabatan</center></th>
					<th><center>Nama jabatan</center></th>
					<th><center>Besaran Uang</center></th>
					<th colspan="3"><center>Action</center></th>
				</tr>
			</thead>
			<tbody>
			<?php
				$no = 1;
			?>
				@foreach($jabatan as $data)
					<tr>
						<td><center>{{ $no++ }}</center></td>
						<td>{{ $data->kode_jabatan }}</td>
						<td>{{ $data->nama_jabatan }}</td>
						<td><?php echo 'Rp. '.number_format($data->besaran_uang, 2, ",", "."); ?></td>
						<td><center><a href="{{ url('jabatan', $data->id) }}" class="btn btn-primary">Lihat</a></center></td>
						<td><center><a href="{{ route('jabatan.edit', $data->id) }}" class="btn btn-warning">Ubah</a></center></td>
						<td><center>
							{!! Form::open(['method' => 'DELETE', 'route' => ['jabatan.destroy', $data->id]]) !!}
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