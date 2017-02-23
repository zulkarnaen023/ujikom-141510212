@extends('layouts.tampilan')

@section('content')
<div class="row mt">
        <div class="col-md-12">
            <h2>Data tunjangan</h2>
			<div class="content-panel">
                <table class="table table-striped table-advance table-hover">
	               <a href="{{ url('/tunjangan/create') }}" class="btn btn-success">Tambah Data</a>
	                  <thead>
                            <tr>
                                <th>No</th>
								<th>Kode tunjangan</th>
								<th>Nama Jabatan</th>
								<th>Nama Golongan</th>
								<th>Status</th>
								<th>Jumlah anak</th>
								<th>Besaran Uang</th>
								<th colspan="3">Action</th>
                            </tr>
                      </thead>
                      <tbody>
                            <tr>
                                <?php
									$no = 1;
								?>
						@foreach($tunjangan as $data)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $data->kode_tunjangan }}</td>
						<td>{{ $data->Jabatan->nama_jabatan }}</td>
						<td>{{ $data->Golongan->nama_golongan}}</td>
						<td>{{ $data->status}}</td>
						<td>{{ $data->jumlah_anak}}</td>
						<td><?php echo 'Rp. '.number_format($data->besaran_uang, 2, ",", "."); ?>
						</td>
						<td>
		                        <a href="{{ url('tunjangan', $data->id) }}" class="fa fa-eye btn btn btn-success" ></a>
		                        </td>
		                        <td>
		                            <a href="{{ route('tunjangan.edit', $data->id) }}" class="fa fa-pencil btn btn-primary" ></a>
		                            <?php $id=$data->id;?>
                                 	{!! Form::open(['method' => 'DELETE', 'route'=>['tunjangan.destroy', $id]]) !!}
                                 	
                                 </td>
                                 <td>
                                 	<button class="btn btn-danger" type="submit"><i class="fa fa-trash-o"></i></button>
                                 	{!! Form::close() !!}
   		                        </td>
		                    </tr>
		                @endforeach
                             
					   </tbody>
                </table>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php echo $tunjangan->render(); ?>
        </div><!-- /content-panel -->
    </div><!-- /col-md-12 -->
</div><!-- /row -->
@endsection