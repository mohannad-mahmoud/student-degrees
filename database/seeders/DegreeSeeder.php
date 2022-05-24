<?php

namespace Database\Seeders;

use App\Models\Degree;
use App\Models\Student;
use App\Models\Subject;
use ArPHP\I18N\Arabic;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Arabic = new Arabic();

        $Arabic->setNumberFeminine(1);
        $Arabic->setNumberFormat(1);

        $integer = 141592653589;

        $text = $Arabic->int2str($integer);
        $faker = Factory::create();
        $students = Student::get();
        foreach ($students as $student){
            $section = $student->section_id;
            $study_year = $student->study_year_id;

            $subjects = Subject::where('section' , $section)->where('study_year' , $study_year)->where('الاول')->get();
            
            foreach ($subjects as $subject){
                $practice_degree = $faker->numberBetween(0 , $subject->practice);
                $exam_degree = $practice_degree >= ((40*$subject->practice)/100) ? $faker->numberBetween(0 , 100 - $subject->practice) : 0;
                $digit_degree = ($practice_degree + $exam_degree);
                Degree::create([
                    'practice_degree' => $practice_degree,
                    'exam_degree' => $exam_degree,
                    'digit_degree' => $digit_degree,
                    'writen_degree' => $Arabic->int2str($digit_degree),
                    'subject_id' => $subject->id,
                    'student_id' => $student->id,
                    'exam_id' => 1,
                    'is_sucess' =>  $digit_degree >= 60 ? true : false
                ]);
            }
        }

    }
}
