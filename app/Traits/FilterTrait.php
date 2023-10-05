<?php

namespace App\Traits;

trait FilterTrait
{

    public function scopeGetMyData($query){
        return $query->when(
            !isUserAdmin(),
            function ($q){return $q->where('user_id',auth()->user()->id);}
        );
    }
}
