<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
 	protected $table = 'jabatans';
    protected $fillable = ['kode_jabatan','nama_jabatan','besaran_uang'];
    protected $vilable = ['kode_jabatan','nama_jabatan','besaran_uang'];
    public $timestamp = true;

    public function kategori_lembur(){
    	return $this->hasMany('App\Kategori_lembur','jabatan_id');
    }
    public function pegawai(){
    	return $this->hasMany('App\Pegawai','jabatan_id');
    }
    public function tunjangan(){
    	return $this->hasMany('App\Tunjangan','jabatan_id');
    }
}
