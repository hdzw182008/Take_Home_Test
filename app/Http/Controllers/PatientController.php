<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    //
    public function index(){
        $patients = Patient::latest();

        if(request('search')){
            $patients = Patient::where('nama', 'like', '%'. request('search') . '%');
        }

        return view('components.patients.index', ['patients'=>$patients->paginate(10)]);
    }
    
    public function create(){
        $lastData = Patient::all();
        $lastData = strval($lastData->count()+1);
        $kode = "P00" . $lastData;
        

        return view('components.patients.create', compact(['kode']));
    }

    public function store(Request $request){
        if(!$request){
            return redirect('/pasien')->with('gagal', 'tidak ada data terinput');
        }
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'golongan_darah' => 'required',
            'kontak' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'usia' => 'required',
        ]);

        Patient::create([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'slug' => Str::slug($request->nama),
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'golongan_darah' => $request->golongan_darah,
            'kontak' => $request->kontak,
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia' => $request->usia,
        ]);

        return redirect('/pasien')->with('success', 'berhasil ditambah');
    }

    public function edit($slug){
        
        $pasien = Patient::where('slug',$slug)->first();

        return view('components.patients.edit', compact(['pasien']));
    }

    public function update(Request $request, $id){
         if(!$request){
            return redirect('/pasien')->with('gagal', 'terjadi kesalahan');
        }
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'golongan_darah' => 'required',
            'kontak' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'usia' => 'required',
        ]);

        $pasien = Patient::find($id);

        $pasien->update([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'slug' => Str::slug($request->nama),
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'golongan_darah' => $request->golongan_darah,
            'kontak' => $request->kontak,
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia' => $request->usia,
        ]);

        return redirect('/pasien')->with('success', 'berhasil diubah');
    }

    public function destroy($slug){
        Patient::where('slug', $slug)->delete();
        return redirect('/pasien')->with('success', 'berhasil dihapus');

    }
}
