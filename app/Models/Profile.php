<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'dni',
        'date_of_birth',
        'profile_photo',
        'card_information',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
