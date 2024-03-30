<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'class',
        'subject_id',
        'fee',
        'status',
        // 'fee_status'
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'students_subjects', 'student_id', 'subject_id');
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

}
