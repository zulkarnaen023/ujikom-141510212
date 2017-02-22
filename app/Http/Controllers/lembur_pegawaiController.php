<?php

namespace App\Http\Controllers;

use Request;
use App\Lembur_pegawai;
use App\Kategori_lembur;
use App\Pegawai;
use Validator;

class lembur_pegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lembur_pegawai = Lembur_pegawai::with('Kategori_lembur')->paginate(5);
        $kategori_lembur = Kategori_lembur::all();
        return view('Lembur_pegawai.index', compact('lembur_pegawai', 'kategori_lembur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $pegawai = Pegawai::all();
        $kategori_lembur = Kategori_lembur::all();
        return view('lembur_pegawai.create', compact('pegawai','kategori_lembur'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori_lembur = array (
            'pegawai_id'=>'required|unique:lembur_pegawais',
            'jumlah_jam'=>'required',
            );
        $pesan = array(
            'pegawai_id.required' =>'Harus Diisi broo',
            'jumlah_jam.required' =>'Harus Diisi broo',
            );

        $validation = Validator::make(Request::all(), $kategori_lembur, $pesan);

        if($validation->fails())
        {
            return redirect('lembur_pegawai/create')->withErrors($validation)->withInput();
        }

        $lembur_pegawai = Request::all();
        Lembur_pegawai::create($lembur_pegawai);
        return redirect('lembur_pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lembur_pegawai = Lembur_pegawai::find($id);
        $kategori_lembur = Kategori_lembur::all();
        $pegawai = Pegawai::all();
        return view('lembur_pegawai.edit', compact('lembur_pegawai','kategori_lembur','pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lembur_pegawai = Request::all();
        $lem_peg = Lembur_pegawai::find($id);
        $lem_peg->update($lembur_pegawai);
        return redirect('lembur_pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lembur_pegawai::find($id)->delete();
        return redirect('lembur_pegawai');
    }
}
