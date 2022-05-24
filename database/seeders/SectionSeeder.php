<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::create([
            'name' => 'البرمجيات',
            'faculty_id' => '1',
        ]);
        Section::create([
            'name' => 'الشبكات',
            'faculty_id' => '1',
        ]);
        Section::create([
            'name' => 'الذكاء الاصطناعي',
            'faculty_id' => '1',
        ]);
        Section::create([
            'name' => 'عام',
            'faculty_id' => '1',
        ]);
    }
}
