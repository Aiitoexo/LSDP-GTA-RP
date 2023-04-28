<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Offenses extends Model
{
    use HasFactory;

    public function action(): HasOne
    {
        return $this->hasOne(Actions::class, 'offense_id');
    }
}
