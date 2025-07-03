<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MixedMedicine extends Model
{
    //
    protected $guarded = ['id'];
    
    public function signa():HasOne{
        return $this->hasOne(Signa::class,'id', 'signa_id');
    }

    public function obatt(): HasMany{
        return $this->hasMany(Medicine::class, 'id', 'obat_id');
    }
    
    public function obats():BelongsToMany{
        return $this->belongsToMany(PivotMedic::class, 'pivot_medics');
    }
}
