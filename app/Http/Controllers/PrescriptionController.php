<?php

namespace App\Http\Controllers;

use App\Models\Signa;
use App\Models\Medicine;
use App\Models\PivotMedic;
use Illuminate\Support\Str;
use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Models\MixedMedicine;
use App\Models\CertainMixMedicine;
use App\Models\CertainPrescription;

class PrescriptionController extends Controller
{
    //
    public function index(){
        $data = Prescription::all()->count()+1;
        $kode = 'P00' . $data + 1;

        $signa = Signa::pluck('signa', 'id');

        $obatData = Medicine::latest();
        $mixObatData = MixedMedicine::latest();

        $resepSementara = CertainPrescription::all();

        if(request('search')){
            $obatData = Medicine::where('nama', 'like', '%' . request('search') . '%');
        }
    



        return view('components.prescriptions.index', ['kode' => $kode,'signa'=>$signa, 'obatData' => $obatData->paginate(5), 'mixObatData' => $mixObatData->paginate(5), 'resepSementara' => $resepSementara]);
    }

    public function racikanBaru(){
         $lastData = MixedMedicine::all();
        $lastData = strval($lastData->count()+1);
        $kode = "ROB00" . $lastData;
        
        $medicines = Medicine::latest();
         if(request('search')){
            $medicines = Medicine::where('nama', 'like', '%'. request('search') . '%');
        }
        $signa = Signa::pluck('signa', 'id');
        return view('components.reseps.racikanBaru', ['kode' => $kode, 'signa' => $signa, 'medicines' => $medicines->paginate(10), 'certainMedicine'=> CertainMixMedicine::all()]);
    }

    public function racikanBaruSimpan(Request $request){
    
        $request->validate([
                'qty' => 'required',
                'nama' => 'required',
        ]);

        //update qty
        $result = array_combine($request->id_obat, $request->qty);
        foreach($result as $key => $value){
            $data[] = CertainMixMedicine::where('id_obat', $key)->first()->update([
                'qty' => $value
            ]);
        }

        //update signa
        $result2 = array_combine($request->id_obat, $request->signa_id);
        foreach($result2 as $key => $value){
            $data[] = CertainMixMedicine::where('id_obat', $key)->first()->update([
                'signa' => $value
            ]);
        }

        $dataCertain = CertainMixMedicine::all();
        
        foreach($dataCertain as $data){
                MixedMedicine::create([
                'nama' => $request->nama,
                'kode' => $request->kode,
                'obat_id' => $data->id_obat,
                'qty' => $data->qty,
                'signa_id' => $data->signa,
            ]);

            $obat = Medicine::find($data->id_obat);

            CertainPrescription::create([
                'name' => $request->nama,
                'type_medicine' => 'racik',
                'items' => $obat->nama,
                'qty' => $data->qty,
                'signa_id' => $data->signa
            ]);
        }
        
        
        CertainMixMedicine::truncate();        
        

        // dd('bisa');
        return redirect('/resep');
    }

    public function obatBaru(Request $request){
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

        CertainPrescription::create([
            'name' => $request->nama,
            'type_medicine' => 'non racik',
            'items' => $request->nama,
            'qty' => 0,
            'signa_id' => $request->signa_id
        ]);
        
        return redirect('/resep');
    }


    public function addCertain(Request $request){
        foreach($request->ids as $isian){
            $data = CertainMixMedicine::find($isian);
        
            CertainPrescription::create([
                'name' => $data->nama,
                'type_medicine' => 'non racik',
                'items' => $data->nama,
                'qty' => 0,
                'signa_id' => $data->signa_id
            ]);
        }
        return back();
    }
}
