@extends('layouts.tampilan')

@section('content')
<div class="row mt">
        <div class="col-md-12">
            <h2>Data pegawai</h2>
			<div class="content-panel">
                <table class="table table-striped table-advance table-hover">
	               <a href="{{ url('/pegawai/create') }}" class="btn btn-success">Tambah Data</a>
	                  <thead>
                            <tr>
                                <th>No</th>
					<th>Nip</th>
					<th>Nama Pegawai</th>
					<th>Nama Jabatan</th>
					<th>Nama Golongan</th>
					<th>Photo</th>
					<th colspan="3">Action</th>
                            </tr>
                      </thead>
                      <tbody>
                            <tr>
                                <?php
									$no = 1;
								?>
						@foreach($pegawai as $data)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $data->nip }}</td>
						<td>{{ $data->User->name }}</td>
						<td>{{ $data->Jabatan->nama_jabatan }}</td>
						<td>{{ $data->Golongan->nama_golongan }}</td>
						<td>
							
								<img src="{{asset('/image/'.$data->photo)}}" height="100px" width="100px">
							
						</td>
						
						<td>
		                        <a href="{{ url('pegawai', $data->id) }}" class="fa fa-eye btn btn btn-success" ></a>
		                        </td>
		                        <td>
		                            <a href="{{ route('pegawai.edit', $data->id) }}" class="fa fa-pencil btn btn-primary" ></a>
		                            <?php $id=$data->id;?>
                                 	{!! Form::open(['method' => 'DELETE', 'route'=>['pegawai.destroy', $id]]) !!}
                                 	
                                 </td>
                                 <td>
                                 	<button class="btn btn-danger" type="submit"><i class="fa fa-trash-o"></i></button>
                                 	{!! Form::close() !!}
   		                        </td>
		                    </tr>
		                @endforeach
                             
					   </tbody>
                </table>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php echo $pegawai->render(); ?>
        </div><!-- /content-panel -->
    </div><!-- /col-md-12 -->
</div><!-- /row -->


@endsection