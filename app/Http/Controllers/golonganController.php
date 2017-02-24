<?php

namespace App\Http\Controllers;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Request;
use App\Golongan;
use DB;
use Validator;
use Input;
use Alert;
class golonganController extends Controller
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
         $golongan = Golongan::paginate(5);
        return view('golongan.index', compact('golongan'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newid = DB::table('golongans')->max('id');
        $newkode = $newid + 1;
        $digit = strlen($newkode);
        if ($digit == '1') {
            $kode = "G00".$newkode;
        }
        elseif ($digit == '2') {
            $kode = "G0".$newkode;
        }
        elseif ($digit == '3') {
            $kode = "G".$newkode;
        }

        

        return view('golongan.create', compact('kode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $rules=['kode_golongan'=>'required|unique:golongans',
                'nama_golongan'=>'required|unique:golongans',
                
                'besaran_uang'=>'required|numeric'];
        $message=['kode_golongan.required'=>'Harus Di Isi',
                'kode_golongan.unique'=>'Tidak Boleh Sama',
                'nama_golongan.unique'=>'Tidak Boleh Sama',
                'nama_golongan.required'=>'Harus Di Isi',
                'besaran_uang.required'=>'Harus Diisi',
                'besaran_uang.numeric'=>'Harus Angka'];
        $valid=Validator::make(Input::all(),$rules,$message);
        if ($valid->fails()) {

            alert()->error('Data Salah');  
            return redirect('golongan/create')
            ->withErrors($valid)
            ->withInput();
        }
        else
        {
        $golongan=Request::all();
        alert()->success('Data Tersimpan');
        golongan::create($golongan);

        
        return redirect('golongan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $golongan = Golongan::find($id);
        return view('golongan.show', compact('golongan'));        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $golongan = Golongan::find($id);
        return view('golongan.edit', compact('golongan', 'kode'));
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
         $golonganUpdate = Request::all();
        $golongan = Golongan::find($id);
        $golongan->update($golonganUpdate);

        return redirect('golongan');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Golongan::find($id)->delete();
        return redirect('golongan');
    }
}
