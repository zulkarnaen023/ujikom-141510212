<?php

namespace App\Http\Controllers;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Request;
use App\Jabatan;
use App\Tunjangan;
use App\Golongan;
use DB;
use Validator;
use Input;

class tunjanganController extends Controller
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
        $tunjangan = Tunjangan::paginate(5);
        return view('tunjangan.index', compact('tunjangan','jabatan','golongan'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tunjangan=Tunjangan::all();
        $jabatan=Jabatan::all();
        $golongan=Golongan::all();
        $newid = DB::table('tunjangans')->max('id');
        $newkode = $newid + 1;
        $digit = strlen($newkode);
        if ($digit == '1') {
            $kode = "T00".$newkode;
        }
        elseif ($digit == '2') {
            $kode = "T0".$newkode;
        }
        elseif ($digit == '3') {
            $kode = "T".$newkode;
        }

        

        return view('tunjangan.create', compact('kode','tunjangan','jabatan','golongan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tunjangan=Request::all();
        Tunjangan::create($tunjangan);
        $tunjangan=Tunjangan::all();
        return redirect('tunjangan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $golongan = Golongan::all();
       $jabatan = Jabatan::all();
        $tunjangan = Tunjangan::find($id);
        return view('tunjangan.show', compact('kode','golongan','jabatan','tunjangan'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $tunjangan = Tunjangan::find($id);
        $jabatan = Jabatan::all();
        $golongan = Golongan::all();
        return view('tunjangan.edit', compact('tunjangan', 'jabatan', 'golongan'));
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
         $tunjanganUpdate = Request::all();
        $tunjangan = Tunjangan::find($id);
        $tunjangan->update($tunjanganUpdate);

        return redirect('tunjangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tunjangan::find($id)->delete();
        return redirect('tunjangan');
    }
}
