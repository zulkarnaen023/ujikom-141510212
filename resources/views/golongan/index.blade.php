@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
	<div class="container">
		<h2>Data Golongan</h2>
		<hr>
		<a href="{{ url('/golongan/create') }}" class="btn btn-success">Tambah Data</a>
		<hr>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr class="success">
					<th><center>No</center></th>
					<th><center>Kode Golongan</center></th>
					<th><center>Nama Golongan</center></th>
					<th><center>Besaran Uang</center></th>
					<th colspan="3"><center>Action</center></th>
				</tr>
			</thead>
			<tbody>
			<?php
				$no = 1;
			?>
				@foreach($golongan as $data)
					<tr>
						<td><center>{{ $no++ }}</center></td>
						<td>{{ $data->kode_golongan }}</td>
						<td>{{ $data->nama_golongan }}</td>
						<td><?php echo 'Rp. '.number_format($data->besaran_uang, 2, ",", "."); ?></td>
						<td><center><a href="{{ url('golongan', $data->id) }}" class="btn btn-primary">Lihat</a></center></td>
						<td><center><a href="{{ route('golongan.edit', $data->id) }}" class="btn btn-warning">Ubah</a></center></td>
						<td><center>
							{!! Form::open(['method' => 'DELETE', 'route' => ['golongan.destroy', $data->id]]) !!}
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