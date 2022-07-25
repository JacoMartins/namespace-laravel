<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $primaryKey = 'uuid';
    protected $keyType = 'string';

    protected $fillable = [
        'username',
        'profile_picture',
        'first_name',
        'last_name',
        'biography',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'uuid' => 'string',
        'username' => 'string',
    ];
}
