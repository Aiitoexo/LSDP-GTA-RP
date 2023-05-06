<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Arrest extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_in_mate_id',
        'offense_id',
        'payed',
        'offense_id',
        'has_conviction',
        'created_at_conviction',
        'fine_remove',
    ];
    protected $casts = [
        'created_at' => 'datetime:d/m/y',
    ];

    public function offense(): BelongsTo
    {
        return $this->belongsTo(Offenses::class);
    }
}
