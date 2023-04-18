<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'uuid',
        'full_name',
        'phone_number',
        'city'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $table = 'students';
}
