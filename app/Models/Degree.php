<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use HasFactory;

    protected $fillable = [
        'practice_degree',
        'exam_degree',
        'digit_degree',
        'writen_degree',
        'subject_id',
        'student_id',
        'exam_id',
        'can_do_exam',
        'practice',
        'is_success',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function exam(){
        return $this->belongsTo(Exam::class);
    }

    public function getSubjectIdAttribute($key)
    {
        return Subject::find($key)->name;
    }

    public function getExamIdAttribute($key)
    {
        return Exam::find($key)->name;
    }

}
