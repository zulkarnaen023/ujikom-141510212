<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lembur_pegawai extends Model
{
    protected $table = 'lembur_pegawais';
    protected $fillable = ['kode_lembur_id','pegawai_id','jumlah_jam'];
    protected $vilable = ['kode_lembur_id','pegawai_id','jumlah_jam'];
    public $timestamp = true;

    public function kategori_lembur(){
    	return $this->belongsTo('App\Kategori_lembur','kode_lembur_id');
    }
    public function pegawai(){
    	return $this->belongsTo('App\Pegawai','pegawai_id');
    }
   
}
