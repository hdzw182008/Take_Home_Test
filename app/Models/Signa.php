<?php

namespace App\Models;

use App\Models\Medicine;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Signa extends Model
{
    use HasFactory;
    //
    public function obatMix(): BelongsTo{
        return $this->belongsTo(MixedMedicine::class);
    }

    public function obat(): BelongsTo{
        return $this->belongsTo(Medicine::class, 'signa_id');
    }
}
