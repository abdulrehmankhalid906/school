<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =[
        'name',
    ];


    public function students()
    {
        return $this->belongsToMany(Student::class, 'students_subjects', 'subject_id', 'student_id');
    }
}
