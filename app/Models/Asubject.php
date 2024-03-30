<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asubject extends Model
{
    use HasFactory;

    protected $fillable = ['inquiry_id', 'subject_id'];
}
