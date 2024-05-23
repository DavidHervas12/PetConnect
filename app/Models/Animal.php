<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'age',
        'gender',
        'weight',
        'image'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function adoption(): HasOne
    {
        return $this->hasOne(Adoption::class);
    }

}
