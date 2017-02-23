@extends('layouts.tampilan')

@section('content')
 <div class="row mt">
        <div class="col-md-12">
            <h2>Data jabatan</h2>
			<div class="content-panel">
                <table class="table table-striped table-advance table-hover">
	               <a href="{{ url('/jabatan/create') }}" class="btn btn-success">Tambah Data</a>
	                  <thead>
                            <tr>
                                <th>No</th>
								<th>Kode jabatan</th>
								<th>Nama jabatan</th>
								<th>Besaran Uang</th>
								<th colspan="3">Action</th>
                            </tr>
                      </thead>
                      <tbody>
                            <tr>
                                <?php
									$no = 1;
								?>
						@foreach($jabatan as $data)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $data->kode_jabatan }}</td>
								<td>{{ $data->nama_jabatan }}</td>
		                        <td><?php echo 'Rp. '.number_format($data->besaran_uang, 2, ",", "."); ?></td>
		                        <td>
		                            <a href="{{ url('jabatan', $data->id) }}" class="fa fa-eye btn btn btn-success" ></a>
		                        </td>
		                        <td>
		                            <a href="{{ route('jabatan.edit', $data->id) }}" class="fa fa-pencil btn btn-primary" ></a>
		                            <?php $id=$data->id;?>
                                 	{!! Form::open(['method' => 'DELETE', 'route'=>['jabatan.destroy', $id]]) !!}
                                 	
                                 </td>
                                 <td>
                                 	<button class="btn btn-danger" type="submit"><i class="fa fa-trash-o"></i></button>
                                 	{!! Form::close() !!}
   		                        </td>
		                    </tr>
		                @endforeach
                             
					   </tbody>

                </table>&nbsp;&nbsp;&nbsp;&nbsp;
                <?php echo $jabatan->render(); ?>
        </div><!-- /content-panel -->
    </div><!-- /col-md-12 -->
</div><!-- /row -->


@endsection