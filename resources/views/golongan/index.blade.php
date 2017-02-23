@extends('layouts.tampilan')

@section('content')
 <div class="row mt">
        <div class="col-md-12">
            <h2>Data Golongan</h2>
			<div class="content-panel">
                <table class="table table-striped table-advance table-hover">
	               <a href="{{ url('/golongan/create') }}" class="btn btn-success">Tambah Data</a>
	                  <thead>
                            <tr>
                                <th>No</th>
								<th>Kode Golongan</th>
								<th>Nama Golongan</th>
								<th>Besaran Uang</th>
								<th colspan="3">Action</th>
                            </tr>
                      </thead>
                      <tbody>
                            <tr>
                                <?php
									$no = 1;
								?>
						@foreach($golongan as $data)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $data->kode_golongan }}</td>
								<td>{{ $data->nama_golongan }}</td>
		                        <td><?php echo 'Rp. '.number_format($data->besaran_uang, 2, ",", "."); ?></td>
		                        <td>
		                            <a href="{{ url('golongan', $data->id) }}" class="fa fa-eye btn btn btn-success" ></a>
		                        </td>
		                        <td>
		                            <a href="{{ route('golongan.edit', $data->id) }}" class="fa fa-pencil btn btn-primary" ></a>
		                            <?php $id=$data->id;?>
                                 	{!! Form::open(['method' => 'DELETE', 'route'=>['golongan.destroy', $id]]) !!}
                                 	
                                 </td>
                                 <td>
                                 	<button class="btn btn-danger" type="submit"><i class="fa fa-trash-o"></i></button>
                                 	{!! Form::close() !!}
   		                        </td>
		                    </tr>
		                @endforeach
                             
					   </tbody>
                </table>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php echo $golongan->render(); ?>
        </div><!-- /content-panel -->
    </div><!-- /col-md-12 -->
</div><!-- /row -->


@endsection