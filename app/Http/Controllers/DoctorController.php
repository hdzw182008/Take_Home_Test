<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    //
    public function index(){
        $doctors = Doctor::latest();

        if(request('search')){
            $doctors = Doctor::where('nama', 'like', '%'. request('search') . '%');
        }

        return view('components.doctors.index', ['doctors'=>$doctors->paginate(10)]);
    }
    
    public function create(){
        $lastData = Doctor::all();
        $lastData = strval($lastData->count()+1);
        $kode = "D00" . $lastData;
        

        return view('components.doctors.create', compact(['kode']));
    }

    public function store(Request $request){
         if(!$request){
            return redirect('/dokter')->with('gagal', 'tidak ada data terinput');
        }
        $request->validate([
            'nama' => 'required',
            'kontak' => 'required|numeric',
            'spesialis' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        Doctor::create([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'slug' => Str::slug($request->nama),
            'kontak' => $request->kontak,
            'spesialis' => $request->spesialis,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect('/dokter')->with('success', 'berhasil ditambah');
    }

    public function edit($slug){
        
        $dokter = Doctor::where('slug',$slug)->first();

        return view('components.doctors.edit', compact(['dokter']));
    }

    public function update(Request $request, $id){
         if(!$request){
            return redirect('/pasien')->with('gagal', 'terjadi kesalahan');
        }
        $request->validate([
            'nama' => 'required',
            'kontak' => 'required|numeric',
            'spesialis' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $dokter = Doctor::find($id);

        $dokter->update([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'slug' => Str::slug($request->nama),
            'kontak' => $request->kontak,
            'spesialis' => $request->spesialis,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect('/dokter')->with('success', 'berhasil diubah');
    }

    public function destroy($slug){
        Doctor::where('slug', $slug)->delete();
        return redirect('/dokter')->with('success', 'berhasil dihapus');

    }
}
