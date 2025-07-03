<?php

namespace App\Http\Controllers;

use App\Models\Signa;
use App\Models\Medicine;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    //
    public function index(){
        $medicines = Medicine::latest();
        // $medicines = Medicine::find(1);
        // dd($medicines->signaObats);

        if(request('search')){
            $medicines = Medicine::where('nama', 'like', '%'. request('search') . '%');
        }

        return view('components.medicines.index', ['medicines'=>$medicines->paginate(10)]);
    }
    
    public function create(){
        $lastData = Medicine::all();
        $lastData = strval($lastData->count()+1);
        $kode = "OB00" . $lastData;
        
        $signa = Signa::pluck('signa', 'id');
        return view('components.medicines.create', ['kode'=> $kode, 'signa'=>$signa]);
    }

    public function store(Request $request){
        // dd(intval($request->signa_id));
         if(!$request){
            return redirect('/pasien')->with('gagal', 'terjadi kesalahan');
        }
        $request->validate([
            'nama' => 'required',
            'dosis' => 'required',
            'golongan' => 'required',
            'satuan' => 'required',
            'stok' => 'required|numeric',
            'signa_id' => 'required|numeric',
            'kadaluarsa' => 'required',
        ]);

        Medicine::create([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'slug' => Str::slug($request->nama),
            'dosis' => $request->dosis,
            'golongan' => $request->golongan,
            'satuan' => $request->satuan,
            'stok' => $request->stok,
            'signa_id' => intval($request->signa_id),
            'kadaluarsa' => $request->kadaluarsa,
        ]);

        return redirect('/obat')->with('success', 'berhasil ditambah');
    }

    public function edit($slug){
        
        $medicine = Medicine::where('slug',$slug)->first();
        $signa = Signa::pluck('signa', 'id');
        
        return view('components.medicines.edit', ['medicine'=> $medicine, 'signa'=>$signa]);
    }

    public function update(Request $request, $id){
         if(!$request){
            return redirect('/pasien')->with('gagal', 'terjadi kesalahan');
        }
        $request->validate([
            'nama' => 'required',
            'dosis' => 'required',
            'golongan' => 'required',
            'satuan' => 'required',
            'stok' => 'required|numeric',
            'signa_id' => 'required|numeric',
            'kadaluarsa' => 'required',
        ]);

        $medicine = Medicine::find($id);

        $medicine->update([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'slug' => Str::slug($request->nama),
            'dosis' => $request->dosis,
            'golongan' => $request->golongan,
            'satuan' => $request->satuan,
            'stok' => $request->stok,
            'signa_id' => $request->signa_id,
            'kadaluarsa' => $request->kadaluarsa,
        ]);

        return redirect('/obat')->with('success', 'berhasil diubah');
    }

    public function destroy($slug){
        Medicine::where('slug', $slug)->delete();
        return redirect('/obat')->with('success', 'berhasil dihapus');

    }
}
