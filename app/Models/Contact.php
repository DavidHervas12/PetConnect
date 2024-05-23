<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'name',
        'lastname',
        'phone_number',
        'address'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function contactLists(): BelongsToMany
    {
        return $this->belongsToMany(ContactList::class, 'contact_contact_list');
    }

}
