<?php

namespace App\Http\Controllers;

use App\Models\CertainMixMedicine;
use App\Models\Medicine;
use App\Models\MixedMedicine;
use App\Models\PivotMedic;
use App\Models\Signa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Barryvdh\DomPDF\Facade\Pdf;

class MixedController extends Controller
{
    //
    public function index(){
        $medicines = MixedMedicine::latest();

        if(request('search')){
            $medicines->where('nama', 'like', '%' . request('search') . '%');
        }

        return view('components.mixedMedicines.index', ['medicines'=>$medicines->get()]);
    }
    
    public function create(){
        $lastData = MixedMedicine::all();
        $lastData = strval($lastData->count()+1);
        $kode = "ROB00" . $lastData;
        
        $medicines = Medicine::latest();
         if(request('search')){
            $medicines = Medicine::where('nama', 'like', '%'. request('search') . '%');
        }
        $signa = Signa::pluck('signa', 'id');
        return view('components.mixedMedicines.create', ['kode' => $kode, 'signa' => $signa, 'medicines' => $medicines->paginate(10), 'certainMedicine'=> CertainMixMedicine::all()]);
    }

    public function store(Request $request){
        
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
        }
        $mixMed = MixedMedicine::where('kode', $request->kode)->get();
        
        foreach($mixMed as $data){
            PivotMedic::create([
                'medicine_id' => $data->obat_id,
                'mixedmedicine_id' => $data->id
            ]);
        }

        CertainMixMedicine::truncate();        

        // dd('bisa');
        return redirect('/obatRacik')->with('success', 'berhasil ditambah');
    }

    public function edit($kode){
        
        $medicine = MixedMedicine::where('kode',$kode)->get();
        $signa = Signa::pluck('signa', 'id');

        $medicines = Medicine::latest();
         if(request('search')){
            $medicines = Medicine::where('nama', 'like', '%'. request('search') . '%');
        }

        return view('components.mixedMedicines.edit', ['medicine'=>$medicine,'signa'=>$signa, 'medicines'=>$medicines->get(), 'kode' => $medicine->first()->kode, 'nama' => $medicine->first()->nama]);
    }

    public function addEdit(Request $request){
         foreach($request->id as $isian){
            $data = Medicine::find($isian);
        
              MixedMedicine::create([
                'nama' => $request->nama,
                'kode' => $request->kode,
                'obat_id' => $data->id,
                'qty' => 0,
                'signa_id' => 1,
            ]);
        }

        return back();

    }

    public function updateData(Request $request, $id){
        $request->validate([
            'nama' => 'required',
            'qty' => 'required'
        ]);

        $medicine = MixedMedicine::where('kode',$id);

        foreach($medicine as $medic){
            $medic->update([
                'nama' => $request->nama,
                'kode' => $request->kode,
            ]);
        }

        //update qty
        $result = array_combine($request->id_obat, $request->qty);
        foreach($result as $key => $value){
            $data[] = MixedMedicine::where('id_obat', $key)->first()->update([
                'qty' => $value
            ]);
        }

        //update signa
        $result2 = array_combine($request->id_obat, $request->signa_id);
        foreach($result2 as $key => $value){
            $data[] = MixedMedicine::where('id_obat', $key)->first()->update([
                'signa' => $value
            ]);
        }

        return redirect('/obatRacik')->with('success', 'berhasil diubah');
    }

    public function destroy($kode){
        $data = MixedMedicine::where('kode', $kode)->get();
        foreach($data as $item){
            PivotMedic::where('medicine_id', $item->obat_id)->where('mixedmedicine_id', $item->id)->delete();
            $item->delete();

        }
        return redirect('/obatRacik')->with('success', 'berhasil dihapus');

    }

    public function hapus($id){
         $data = MixedMedicine::where('obat_id', $id)->get();
         
         foreach($data as $item){
             PivotMedic::where('medicine_id', $item->obat_id)->where('mixedmedicine_id', $item->id)->delete();
             
             $item->delete();
        }
        return back();
    }

    public function cetak(){
        // return view('cetak.index', ['data' => MixedMedicine::all()])->with('print', true);
        $data = MixedMedicine::all();
        $pdf = PDF::loadView('cetak.index', ['data' => $data]);

        return $pdf->stream('cetak.pdf');
    }
    
}
