<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'dob',
        'photo_url',
        'address',
        'grade',
        'session',
        'parent_contact',
        'enrolled_date',
        'status',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function userCreated()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function userUpdated()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    protected static function booted()
    {
        static::deleting(function ($student) {
            $student->attendances()->delete();
            $student->payments()->delete();
        });
    }
}
