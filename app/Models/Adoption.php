<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Adoption extends Model
{
    use HasFactory;

    protected $fillable = [
        'adopter_email',
        'adopter_name',
        'adopter_lastname',
        'adopter_address',
        'adopter_phone_number',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }


}
