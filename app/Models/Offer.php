<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'section',
        'schedule',
        'room',
        'capacity',
        'year_level',
        'subject_id',
        'program_id',
        'teacher_id',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function enrollment()
    {
        return $this->belongsToMany(Student::class, 'enrollments', 'offer_id', 'student_id');
    }



}
