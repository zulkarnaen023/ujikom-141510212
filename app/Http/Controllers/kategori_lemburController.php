<?php

namespace App\Http\Controllers;

use Request;
use App\Jabatan;
use App\Kategori_lembur;
use App\Golongan;
use DB;
use Validator;
use Input;
class kategori_lemburController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('Admin');
    }
    public function index()
    {
        $jabatan = Jabatan::all();
        $golongan = Golongan::all();
         $kategori_lembur = Kategori_lembur::all();
        return view('kategori_lembur.index', compact('kategori_lembur','jabatan','golongan'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        $golongan = Golongan::all();
        $kategori_lembur=Kategori_lembur::all();
        $newid = DB::table('kategori_lemburs')->max('id');
        $newkode = $newid + 1;
        $digit = strlen($newkode);
        if ($digit == '1') {
            $kode = "K00".$newkode;
        }
        elseif ($digit == '2') {
            $kode = "K0".$newkode;
        }
        elseif ($digit == '3') {
            $kode = "K".$newkode;
        }

        

        return view('kategori_lembur.create', compact('kode','golongan','jabatan','kategori_lembur'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $kategori_lembur = Request::all();
        $jb = Validator::make($kategori_lembur, [
                'kode_lembur' => 'required|unique',
                'jabatan_id' => 'required',
                'golongan_id' => 'required',
                'besaran_uang' => 'required'
        ]);
        $jb = Kategori_lembur::create([
            'kode_lembur' => $kategori_lembur['kode_lembur'],
            'jabatan_id' => $kategori_lembur['jabatan_id'],
            'golongan_id' => $kategori_lembur['golongan_id'],
            'besaran_uang' => $kategori_lembur['besaran_uang']
        ]);

        return redirect('kategori_lembur');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $jabatan = Jabatan::all();
        $golongan = Golongan::all();
         $kategori_lembur = kategori_lembur::find($id);
        return view('kategori_lembur.show', compact('kategori_lembur','kode','jabatan','golongan'));        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $jabatan = Jabatan::all();
        $golongan = Golongan::all();
         $kategori_lembur = kategori_lembur::find($id);
        return view('kategori_lembur.edit', compact('kategori_lembur', 'kode','jabatan','golongan'));
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
         $kategori_lemburUpdate = Request::all();
        $kategori_lembur = kategori_lembur::find($id);
        $kategori_lembur->update($kategori_lemburUpdate);

        return redirect('kategori_lembur');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kategori_lembur::find($id)->delete();
        return redirect('kategori_lembur');
    }
}
