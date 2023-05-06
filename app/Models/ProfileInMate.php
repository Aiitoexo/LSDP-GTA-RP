<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProfileInMate extends Model
{
    use HasFactory;

    protected $fillable = [
        'identity_number',
        'picture_url',
        'firstname',
        'lastname',
        'gender',
        'birthday',
        'age',
        'address',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(CommentProfile::class);
    }

    public function arrests(): HasMany
    {
        return $this->hasMany(Arrest::class);
    }
}
