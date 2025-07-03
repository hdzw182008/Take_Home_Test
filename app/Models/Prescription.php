<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prescription extends Model
{
    //
    protected $guarded = ['id'];

    public function obat(): HasMany{
        return $this->hasMany(Medicine::class, 'id', 'medicine_id');
    }

    public function obatRacik(): HasMany{
        return $this->hasMany(MixedMedicine::class, 'id', 'mixedmedicine_id');
    }
}
