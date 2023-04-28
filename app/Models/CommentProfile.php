<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentProfile extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:d/m/y',
    ];
    public function profile(): BelongsTo
    {
        return $this->belongsTo(ProfileInMate::class);
    }
}
