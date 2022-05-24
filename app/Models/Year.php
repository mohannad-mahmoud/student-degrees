<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function exams(){
        return $this->hasMany(Exam::class);
    }

    public function degrees(){
        return $this->hasMany(Degree::class);
    }

}
