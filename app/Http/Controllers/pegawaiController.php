<?php

namespace App\Http\Controllers;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Jabatan;
use App\Golongan;
use App\User;
use App\Pegawai;
use DB;
use Validator;
use Input;
use File;
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
        $this->middleware('Hrd');
    }
    
    public function index()
    {
        $jabatan = Jabatan::all();
        $golongan = Golongan::all();
        $pegawai = Pegawai::paginate(5);
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

        $jabatan = Jabatan::all();
        $golongan = Golongan::all();
        return view('pegawai.create', compact('kode', 'pegawai', 'jabatan', 'golongan'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|min:6|confirmed',
            'permission' => 'required',
            'nip' => 'required|unique:pegawais,nip',
        ]);
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'permission' =>  $request['permission'],
        ]);
        $pegawai = new Pegawai;
        $pegawai->nip =  $request['nip']; 
        $pegawai->user_id = $user->id;  
        $pegawai->jabatan_id =  $request['jabatan_id']; 
        $pegawai->golongan_id =  $request['golongan_id']; 
        
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $destinationPath = public_path().'/image/';
            $filename = str_random(6).'_'.$file->getClientOriginalExtension();
            $uploadSuccess = $file->move($destinationPath, $filename);
            
            $pegawai->photo = $filename;          
        }
        else{
            $pegawai->photo = 'default.png';
           
        }
        $pegawai->save();
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
            $pegawai->nip = $request->get('nip');
            $pegawai->golongan_id = $request->get('golongan_id');
            $pegawai->jabatan_id = $request->get('jabatan_id');

        $this -> validate($request, [
            'nip' => 'required|numeric|min:3|',
            ]);

        if($request->hasFile('photo')){
            $filename = null;
            $uploaded_photo = $request->file('photo');
            $extension = $uploaded_photo->getClientOriginalExtension();
            $filename = md5 (time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . '/image/';
            $uploaded_photo->move($destinationPath, $filename);
            if ($pegawai->photo) {
                $old_photo = $pegawai->photo;
                $filepath = public_path() . DIRECTORY_SEPARATOR . '/image/' . DIRECTORY_SEPARATOR . $pegawai->photo;
                try {
                    File::delete($filepath);
                } catch(FileNotFoundException $e) {
                    // File sudah dihapus/tidak ada
                }
            }
            $pegawai->photo = $filename;
        }
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
