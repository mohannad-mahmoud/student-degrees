<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'faculty_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }

    public function subjects(){
        return $this->hasMany(Subject::class);
    }
    
    public function students(){
        return $this->hasMany(Student::class);
    }

}
