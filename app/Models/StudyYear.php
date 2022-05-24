<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function subjects(){
        return $this->hasMany(Subject::class);
    }

    public function students(){
        return $this->hasMany(Student::class);
    }
}
