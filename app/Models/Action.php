<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $fillable = [
        'user_id',
        'student_id',
        'teacher_id',
        'report_id',
        'exist',
        'pages',
        'hadiths',
        'clothes',
        'noisy',
        'gift'

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
    
}
