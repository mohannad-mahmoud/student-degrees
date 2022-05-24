<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'season',
        'section_id',
        'study_year_id',
        'practice',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function studyYear(){
        return $this->belongsTo(StudyYear::class);
    }

    public function degree(){
        return $this->hasOne(Degree::class);
    }

}
