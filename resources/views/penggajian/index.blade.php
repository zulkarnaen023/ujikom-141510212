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
                        
                        <div class="col-md-0 col-sm-0">
                        
                        <a href="{{url('penggajian/create')}}"> <button class=" btn btn-circle btn-gradient btn-danger" value="primary">
                                <span class="fa  fa-pencil fa-1x"></span>
                              </button></a>
                             
                              
                                 
         

                        <div class="panel-body">
                            <div class="row">
                              <form action="{{url('penggajian')}}/?nip=nip"> <input type="text" name="nip"> <button type="submit" class="btn btn-primary">
                                    cari
                                </button>

                                </form>
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                      <table class="table table-striped table-hover table-bordered">
                        @php
                            $no=1 ;
                        @endphp
                        @foreach($penggajian as $datapenggajian)
                        @php
                             ;
                        @endphp
                        <div class="col-md-6">
                        <center>
                            <img height="120px" alt="Smiley face" width="120px" class="img-circle" src="/assets/image/{{$datapenggajian->tunjangan_pegawai->pegawai->photo}}">

                        <h3>{{$datapenggajian->tunjangan_pegawai->pegawai->User->name}}</h3>
                        <h4>{{$datapenggajian->tunjangan_pegawai->pegawai->nip}}</h4>
                        <h5><b>@if($datapenggajian->tanggal_pengambilan == ""&&$datapenggajian->status_pengambilan == "0")
                            Gaji Belum Diambil
                               <a class="btn btn-success col-md-4" href="{{route('penggajian.edit',$datapenggajian->id)}}">Ambil Gaji </a>
                        @elseif($datapenggajian->tanggal_pengambilan == ""||$datapenggajian->status_pengambilan == "0")


                            Gaji Belum Diambil
                            <br>
                            <br>
                            
                          <center> <b>  <a class="btn btn-success col-md-12" href="{{route('penggajian.edit',$datapenggajian->id)}}">Ambil Gaji </a></b></center>
                            <br>
                            <br>
                            <br>

                             
                        
                        @else
                            Gaji Sudah Diambil Pada {{$datapenggajian->tanggal_pengambilan}}
                        @endif</b></h5>
<h5>jam Lembur Sebesar Rp.{{$datapenggajian->jumlah_jam_lembur}},Gaji Lembur Sebesar Rp.{{$datapenggajian->jumlah_uang_lembur}} ,Gaji Pokok Sebesar Rp.{{$datapenggajian->gaji_pokok}} ,Mendapat Tunjangan Sebesar Rp.{{$datapenggajian->tunjangan_pegawai->tunjangan->besaran_uang}} ,Jadi Total Gaji Rp.{{$datapenggajian->total_gaji}}

                        </h5>
                        <b>
                                <a class="btn btn-primary col-md-4" href="{{route('penggajian.show',$datapenggajian->id)}}">Detail</a>
                            </b></h5>
                                                 
              <form method="POST" action=" {{route('penggajian.destroy', $datapenggajian->id)}} ">
                                {{csrf_field()}}
        <input type="hidden" name="_method" value="DELETE">
        <input class="btn btn-xs btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ?');" type="submit" value="Hapus">
                            </form>
             
                      
                     
                    
                                
                        </center>
                        </div> 
                        @endforeach
                        
                    </table>
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

@stop