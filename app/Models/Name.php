<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'registers',
        'created_at',
        'updated_at',
        'who_posted'
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
    ];
}
