<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'offer_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

}
