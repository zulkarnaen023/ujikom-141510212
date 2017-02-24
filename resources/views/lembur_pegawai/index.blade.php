@extends('layouts.tampilan')

@section('content')
<div class="row mt">
        <div class="col-md-12">
            <h2>Data lembur pegawai</h2>
			<div class="content-panel">
                <table class="table table-striped table-advance table-hover">
	               <a href="{{ url('/lembur_pegawai/create') }}" class="btn btn-success">Tambah Data</a>
	                  <thead>
                            <tr>
                                <th>No</th>
								<th>Kode lembur</th>
								<th>Nama Pegawai</th>
								<th>Jumlah Jam</th>
								<th>Besaran uang</th>
								<th colspan="3">Action</th>
                            </tr>
                      </thead>
                      <tbody>
                            <tr>
                                <?php
									$no = 1;
								?>
					
                            @foreach($lembur_pegawai as $data)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $data->kategori_lembur->kode_lembur }}</td>
						<td>{{ $data->pegawai->User->name }}</td>
						<td>{{ $data->jumlah_jam}}</td>
						<td><?php echo 'Rp.'. number_format($data->Kategori_lembur->besaran_uang*$data->jumlah_jam, 2,",","."); ?></td>
						<td>
		                        <a href="{{ url('lembur_pegawai', $data->id) }}" class="fa fa-eye btn btn btn-success" ></a>
		                        </td>
		                        <td>
		                            <a href="{{ route('lembur_pegawai.edit', $data->id) }}" class="fa fa-pencil btn btn-primary" ></a>
		                            <?php $id=$data->id;?>
                                 	{!! Form::open(['method' => 'DELETE', 'route'=>['lembur_pegawai.destroy', $id]]) !!}
                                 	
                                 </td>
                                 <td>
                                 	<button class="btn btn-danger" type="submit"><i class="fa fa-trash-o"></i></button>
                                 	{!! Form::close() !!}
   		                        </td>
		                    </tr>
		                @endforeach
                              
					   </tbody>
                </table>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php echo $lembur_pegawai->render(); ?>
        </div><!-- /content-panel -->
    </div><!-- /col-md-12 -->
</div><!-- /row -->
@endsection