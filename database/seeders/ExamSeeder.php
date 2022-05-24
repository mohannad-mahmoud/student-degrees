<?php

namespace Database\Seeders;

use App\Models\Exam;
use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Exam::create([
            'name' => 'الدورة الامتحانية الاولى',
            'year_id' => 1
        ]);
        
        Exam::create([
            'name' => 'الدورة الامتحانية الثانية',
            'year_id' => 1
        ]);

        Exam::create([
            'name' => 'الدورة الامتحانية الاولى',
            'year_id' => 2
        ]);
        
        Exam::create([
            'name' => 'الدورة الامتحانية الثانية',
            'year_id' => 2
        ]);

        
        Exam::create([
            'name' => 'الدورة الامتحانية الاولى',
            'year_id' => 3
        ]);
        
        Exam::create([
            'name' => 'الدورة الامتحانية الثانية',
            'year_id' => 3
        ]);

        
        Exam::create([
            'name' => 'الدورة الامتحانية الاولى',
            'year_id' => 4
        ]);
        
        Exam::create([
            'name' => 'الدورة الامتحانية الثانية',
            'year_id' => 4
        ]);


        Exam::create([
            'name' => 'الدورة الامتحانية الاولى',
            'year_id' => 5
        ]);
        
        Exam::create([
            'name' => 'الدورة الامتحانية الثانية',
            'year_id' => 5
        ]);

        Exam::create([
            'name' => 'الدورة التكميلية للخريجين',
            'year_id' => 2
        ]);

        
    }
}
