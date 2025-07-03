<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Medicine extends Model
{
    //
    protected $guarded =['id'];
    protected $with = ['signaObats'];

    public function obatMix(): BelongsToMany{
        return $this->belongsToMany(PivotMedic::class, 'pivot_medics');
    }

    public function signaObats(): HasOne{
        return $this->hasOne(Signa::class, 'id', 'signa_id');
    }
}
