<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected  $table = "students";

    protected $fillable = [
        'nama',
        'phone',
        'email',
        'kelas',
        'gender',
        'nisn',
        'major_id',
    ];

     public function major()
    {
        return $this->belongsTo(Major::class, 'major_id', 'major_id');
    }
}
