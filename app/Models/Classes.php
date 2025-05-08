<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_name',
        'session',
        'room',
        'max_capacity',
        'user_id',
        'time',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
