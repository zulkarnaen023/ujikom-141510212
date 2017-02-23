@extends('layouts.tampilan')

@section('content')
       <div id="content">
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">

                        <h3 class="animated fadeInLeft">Customer Service</h3>
                        <p class="animated fadeInDown"><span class="fa  fa-map-marker"></span> Batavia,Indonesia</p>

                       
                    </div>
                    <div class="col-md-0 col-sm-12">
                        
                       
                             
                              
                                 
               
                <div class="panel-body">
                  {!! Form::model($penggajian,['method' => 'PATCH','route'=>['penggajian.update',$penggajian->id]]) !!}
    {!! csrf_field() !!}
<table  class="table" >
@php
$date=date('Y-m-d');
@endphp
<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="tunjangan_pegawai_id" value="{{$penggajian->tunjangan_pegawai_id}}">
     <input type="hidden" name="jumlah_jam_lembur" value="{{$penggajian->jumlah_jam_lembur}}">
      <input type="hidden" name="jumlah_uang_lembur" value="{{$penggajian->jumlah_uang_lembur}}">
       <input type="hidden" name="gaji_pokok" value="{{$penggajian->gaji_pokok}}">
        <input type="hidden" name="total_gaji" value="{{$penggajian->total_gaji}}">
       <input type="hidden" name="tanggal_pengambilan" value="{{$date}}">
       <input type="hidden" name="status_pengambilan" value="1">
       <input type="hidden" name="petugas_penerima" value="{{$penggajian->petugas_penerima}}">

   <input type="hidden" name="status_pengembalian" value="1">
    
   
    
   <input type="submit" value="Ambil Gaji" class="btn btn-success col-md-12"></input></td>
    </tr>
</table>
                </div>
            </div>
        </div>
    </div>
</div>
  {!! Form::close() !!}
                                    </div>

                                </div>

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!--End simple table example -->

                </div>

               







                </div>

            </div>

                                       </div>
                          </div>
                        </div>                   
                    </div>
                  </div>                    
                </div>

@endsection
