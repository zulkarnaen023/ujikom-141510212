@extends('layouts.tampilan')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-black">
                <div class="panel-heading">TUNJANGAN PEGAWAI</div>

                <div class="panel-body">
                    <a href="{{route('tunjangan_pegawai.create')}}" class="btn btn-success">Tambah Data</a>	
                    <center>{{$tp->links()}}</center>
	<br>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr class="bg-info">
				<th>No</th>
				<th>Kode Tunjangan Id</th>
				<th>Nama Pegawai</th>
				<th colspan="3"><center>Action</center></th>
			</tr>
		</thead>
		@php
		$no = 1;
		@endphp
		@foreach($tp as $data)
		<tbody>
			<td>{{$no++}}</td>
			<td>{{$data->Tunjangan->kode_tunjangan}}</td>
			<td>{{$data->Pegawai->User->name}}</td>
			<td><center><a href="{{route('tunjangan_pegawai.edit', $data->id)}}" class="btn btn-primary">Edit</a></center></td>
			<td><center>
				<form method="POST" action="{{route('tunjangan_pegawai.destroy', $data->id)}}">
					{{csrf_field()}}
					<input type="hidden" name="_method" value="DELETE">
					<input class="btn btn-danger" onclick="return confirm('Yakin Mau Menghapus Data? ');" type="submit" value="Hapus"></form>
				</center></td>
		</tbody>
		@endforeach
		</table>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php echo $tp->render(); ?>
	</div>
</div>
</div>
</div>
</div>

@endsection