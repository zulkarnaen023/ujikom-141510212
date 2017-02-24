<?php

namespace App\Http\Controllers;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Request;
use App\Lembur_pegawai;
use App\Kategori_lembur;
use App\Pegawai;
use Validator;
use Input;

class lembur_pegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('Keuangan');
    }
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
        $kategori_lembur = kategori_lembur::all();
        
        $lembur_pegawai = Request::all();
        $rules = ['pegawai_id' => 'required',
                  'jumlah_jam' => 'required|numeric'];
        $sms = ['pegawai_id.required' => 'Harus Diisi',
                'jumlah_jam.required' => 'Harus Diisi',
                'jumlah_jam.numeric' => 'Harus Angka'];
        $valid=Validator::make(Input::all(),$rules,$sms);
        if ($valid->fails()) {

            alert()->error('Data Salah');  
            return redirect('lembur_pegawai/create')
            ->withErrors($valid)
            ->withInput();
        }
        else
        {
        alert()->success('Data Tersimpan');
        $pegawai = pegawai::where('id',$lembur_pegawai['pegawai_id'])->first();
        $check = kategori_lembur::where('jabatan_id',$pegawai->jabatan_id)->where('golongan_id',$pegawai->golongan_id)->first();
        if(!isset($check)){
            $pegawai = pegawai::with('User')->get();
            $missing_count = true;
            // dd($error_klnf);
            return view('lembur_pegawai.create',compact('kategori_lembur','pegawai','missing_count'));
        }
        $lembur_pegawai['kode_lembur_id'] = $check->id;
        
        lembur_pegawai::create($lembur_pegawai);
        }
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
