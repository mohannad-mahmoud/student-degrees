<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'fname',
        'lname',
        'mname',
        'moname',
        'u_number',
        'n_number',
        'faculty_id',
        'section_id',
        'study_year_id',
        'number_of_remain_subjects',
        'national_exam_degree',
        'national_exam_taken',
        'national_exam_name',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }

    public function section(){
        return $this->belongsTo(Section::class);
    }
    
    public function studyYear(){
        return $this->belongsTo(StudyYear::class);
    }

    public function degrees(){
        return $this->hasMany(Degree::class);
    }

    // public function getStudyYearIdAttribute($key){
    //     return StudyYear::find($key)->name;
    // }

}
