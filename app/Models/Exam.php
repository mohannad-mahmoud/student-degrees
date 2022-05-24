<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam',
        'year_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function year(){
        return $this->belongsTo(Year::class);
    }
}
