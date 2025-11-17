<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'phone',
        'email',
        'kelas',
        'gender',
        'nisn',
        'major_id',
    ];
}
