<?php

namespace App\Http\Controllers;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Request;
use App\Jabatan;
use DB;
use Validator;
use Input;
class jabatanController extends Controller
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
         $jabatan = Jabatan::paginate(5);
        return view('jabatan.index', compact('jabatan'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newid = DB::table('jabatans')->max('id');
        $newkode = $newid + 1;
        $digit = strlen($newkode);
        if ($digit == '1') {
            $kode = "J00".$newkode;
        }
        elseif ($digit == '2') {
            $kode = "J0".$newkode;
        }
        elseif ($digit == '3') {
            $kode = "J".$newkode;
        }

        

        return view('jabatan.create', compact('kode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jabatan = Request::all();
        $jb = Validator::make($jabatan, [
                'kode_jabatan' => 'required',
                'nama_jabatan' => 'required|unique',
                'besaran_uang' => 'required'
        ]);
        $jb = jabatan::create([
            'kode_jabatan' => $jabatan['kode_jabatan'],
            'nama_jabatan' => $jabatan['nama_jabatan'],
            'besaran_uang' => $jabatan['besaran_uang']
        ]);

        return redirect('jabatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $jabatan = Jabatan::find($id);
        return view('jabatan.show', compact('jabatan'));        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $jabatan = Jabatan::find($id);
        return view('jabatan.edit', compact('jabatan', 'kode'));
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
         $jabatanUpdate = Request::all();
        $jabatan = Jabatan::find($id);
        $jabatan->update($jabatanUpdate);

        return redirect('jabatan');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jabatan::find($id)->delete();
        return redirect('jabatan');
    }
}
