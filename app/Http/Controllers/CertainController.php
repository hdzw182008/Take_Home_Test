<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\PivotMedic;
use Illuminate\Http\Request;
use App\Models\MixedMedicine;
use App\Models\CertainMixMedicine;

class CertainController extends Controller
{
    
    public function store(Request $request){
        
        foreach($request->id as $isian){
            $data = Medicine::find($isian);
        
            CertainMixMedicine::create([
                'id_obat' => $data->id,
                'nama_obat' => $data->nama,
                'qty' => 0,
                'signa' => $data->signa_id,
            ]);
        }

        return back();
    }

}
