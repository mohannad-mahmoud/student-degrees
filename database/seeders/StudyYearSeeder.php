<?php

namespace Database\Seeders;

use App\Models\StudyYear;
use Illuminate\Database\Seeder;

class StudyYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StudyYear::create([
            'name' => 'الاولى'
        ]);
        
        StudyYear::create([
            'name' => 'الثانية'
        ]);
        
        StudyYear::create([
            'name' => 'الثالثة'
        ]);
        
        StudyYear::create([
            'name' => 'الرابعة'
        ]);
        
        StudyYear::create([
            'name' => 'الخامسة'
        ]);
        
        StudyYear::create([
            'name' => 'السادسة'
        ]);
    }
}
