<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tunjangan_pegawai extends Model
{
    protected $table = 'tunjangan_pegawais';
    protected $fillable = ['kode_tunjangan_id','pegawai_id'];
    protected $vilable = ['kode_tunjangan','pegawai_id'];
    public $timestamp = true;

    public function pegawai(){
    	return $this->hasMany('App\Pegawai','pegawai_id');
    }
    public function tunjangan(){
    	return $this->belongsTo('App\Tunjangan','kode_tunjangan_id');
    }
    public function penggajian(){
    	return $this->hasMany('App\Penggajian','tunjangan_pegawai_id');	
    }
}