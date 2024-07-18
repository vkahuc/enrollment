<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'sex',
        'year_level',
        'birthday',
        'program_id'

    ];
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    public function enrollments(): BelongsToMany
    {
        return $this->belongsToMany(Enrollment::class);
    }

    public function offers(): BelongsToMany

    {
        return $this->belongsToMany(Offer::class, 'enrollments', 'student_id', 'offer_id')
            ->withTimestamps();
    }

    protected static function boot()
    {
        parent::boot();

        // Listen for the creating event to set the default email
        static::creating(function ($student) {
            $lastNameLowercase = strtolower($student->last_name);
            $firstNameLowercase = strtolower($student->first_name);
            $firstName = str_replace(' ', '_', $firstNameLowercase);
            $email = $lastNameLowercase . '.' . $firstName . '@hnu.edu.ph';
            $student->email = $email;
        });

        // Listen for the created event to set the default password
        static::created(function ($student) {
            $student->password = $student->last_name . $student->id; // Set password as lastname + id
            $student->save(); // Save the model to update the password field
        });
    }

}
