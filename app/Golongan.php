<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $table = 'golongans';
    protected $fillable = ['kode_golongan','nama_golongan','besaran_uang'];
    protected $vilable = ['kode_golongan','nama_golongan','besaran_uang'];
    public $timestamp = true;

    public function kategori_lembur(){
    	return $this->hasMany('App\Kategori_lembur','golongan_id');
    }
    public function pegawai(){
    	return $this->hasMany('App\Pegawai','golongan_id');
    }
    public function tunjangan(){
    	return $this->hasMany('App\Tunjangan','golongan_id');
    }
}
