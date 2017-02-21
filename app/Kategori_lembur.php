<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori_lembur extends Model
{
   protected $table = 'kategori_lemburs';
    protected $fillable = ['kode_lembur','jabatan_id','golongan_id','besaran_uang'];
    protected $vilable = ['kode_lembur','jabatan_id','golongan_id','besaran_uang'];
    public $timestamp = true;

    public function jabatan(){
    	return $this->belongsTo('App\Jabatan','jabatan_id');
    }
    public function golongan(){
    	return $this->belongsTo('App\Golongan','golongan_id');
    }
    public function lembur_pegawai(){
    	return $this->hasMany('App\Lembur_pegawai','kode_lembur_id');
    }
}
