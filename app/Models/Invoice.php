<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'student_id',
        'payment_month',
        'total_amount',
        'paid_amount',
        'remaining_amount',
        'payment_date',
        'payment_status'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
