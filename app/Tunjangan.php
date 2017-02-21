<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tunjangan extends Model
{
    protected $table = 'tunjangans';
    protected $fillable = ['kode_tunjangan','jabatan_id','golongan_id','status','jumlah_anak','besaran_uang'];
    protected $vilable = ['kode_tunjangan','jabatan_id','golongan_id','status','jumlah_anak','besaran_uang'];
    public $timestamp = true;

    public function jabatan(){
    	return $this->belongsTo('App\Jabatan','jabatan_id');
    }
    public function golongan(){
    	return $this->belongsTo('App\Golongan','golongan_id');
    }
    public function tunjangan_pegawai(){
    	return $this->hasMany('App\Tunjangan_pegawai','kode_tunjangan_id')
    }
   
}
