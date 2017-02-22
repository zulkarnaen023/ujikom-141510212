<?php

namespace App\Http\Controllers;

use Request;
use App\Jabatan;
use App\Golongan;
use App\User;
use App\Pegawai;
use DB;
use Validator;
use Input;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class pegawaiController extends Controller
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
        $pegawai = Pegawai::all();
        return view('pegawai.index', compact('jabatan', 'golongan', 'pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $untukid = DB::table('pegawais')->max('id');
        $newkode = $untukid + 1;
        $digit = strlen($newkode);
        if ($digit == '1') {
            $kode = "1049652000".$newkode;
        }
        elseif ($digit == '2') {
            $kode = "104965200".$newkode;
        }
        elseif ($digit == '3') {
            $kode = "10496520".$newkode;
        }
        elseif ($digit == '4') {
            $kode = "1049652".$newkode;
        }

        $dd = User::all();
        $jabatan = Jabatan::all();
        $golongan = Golongan::all();
        return view('pegawai.create', compact('kode', 'pegawai', 'dd', 'jabatan', 'golongan'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Request::all();
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            'permission' => $input['permission']
        ]);

        $file = Input::file('photo');
        $destinationPath = public_path().'/image/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);

        if(Input::hasFile('photo')){
           $mm = new Pegawai;
           $mm->Nip = Input::get('nip'); 
           $mm->user_id = $user->id;  
           $mm->jabatan_id = Input::get('jabatan_id'); 
           $mm->golongan_id = Input::get('golongan_id'); 
           $mm->Photo = $filename;
           $mm->save();
        }
        return redirect('pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $pegawai = Pegawai::find($id);
        return view('pegawai.show', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $pegawai = pegawai::find($id);
        $jabatan = Jabatan::all();
        $golongan = Golongan::all();

        return view('pegawai.edit', compact('pegawai', 'jabatan', 'golongan'));
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
        $pegawai = Pegawai::find($id);

        if(Request::hasFile('Photo')){
            $file = Request::file('Photo');
            $destinationPath = public_path().'/image/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
        }
        
        $pegawai->Nip = Request::get('Nip'); 
        $pegawai->jabatan_id = Request::get('jabatan_id'); 
        $pegawai->golongan_id = Request::get('golongan_id'); 
        $pegawai->Photo = $filename;
        $pegawai->save();
        return redirect('pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai=Pegawai::find($id);
        $User=User::where('id',$pegawai->user_id)->delete();
        $pegawai->delete();
        return redirect('pegawai');
    }
}
