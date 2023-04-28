<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Actions extends Model
{
    use HasFactory;

    public function offense(): BelongsTo
    {
        return $this->belongsTo(Offenses::class);
    }
}
