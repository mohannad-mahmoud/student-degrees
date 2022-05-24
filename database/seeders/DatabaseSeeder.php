<?php

namespace Database\Seeders;

use App\Models\Degree;
use App\Models\Student;
use App\Models\Subject;
use ArPHP\I18N\Arabic;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                UserSeeder::class,
                FacultySeeder::class,
                YearSeeder::class,
                ExamSeeder::class,
                SectionSeeder::class,
                StudyYearSeeder::class,
                SubjectSeeder::class,
            ]
        );
        \App\Models\User::factory(10)->create();


        $faker = Factory::create();
        $limit = 10;
        $Arabic = new Arabic();

        $Arabic->setNumberFeminine(1);
        $Arabic->setNumberFormat(1);

        ### 1 ### ادخال طلاب السنة الاولى  ###
        for ($i = 0; $i < $limit; $i++) {
            Student::create([
                'fname' => $faker->firstNameMale(),
                'lname' => $faker->firstNameMale(),
                'mname' => $faker->firstNameMale(),
                'moname' => $faker->firstNameFemale(),
                'u_number' => $faker->unique()->numberBetween(1000, 99999),
                'n_number' => '06' . $faker->unique()->numberBetween(10000000, 99999999),
                'faculty_id' => 1,
                'section_id' => 4,
                'study_year_id' => 1,
                'number_of_remain_subjects' => '11',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
        ##################################################### //1

        ### 2 ##### ادخال درجات طلاب السنة الاولى - الفصل الاول ### 
        $students = Student::where('study_year_id', 1)->get();
        foreach ($students as $student) {
            $section_id = $student->section_id;
            $study_year_id = $student->study_year_id;
            $subjects = Subject::where('section_id', $section_id)->where('study_year_id', $study_year_id)->where('season', 'الاول')->get();

            foreach ($subjects as $subject) {
                $practice_degree = $faker->numberBetween(7, $subject->practice);
                $exam_degree = $practice_degree >= ((40 * $subject->practice) / 100) ? $faker->numberBetween(30, 100 - $subject->practice) : 0;
                $digit_degree = ($practice_degree + $exam_degree);
                $can_do_exam = $practice_degree >= ((40 * $subject->practice) / 100) ? 1 : 0;
                $is_success = $digit_degree >= 60 ? true : false;
                Degree::create([
                    'practice' => $subject->practice,
                    'practice_degree' => $practice_degree,
                    'exam_degree' => $exam_degree,
                    'digit_degree' => $digit_degree,
                    'writen_degree' => $Arabic->int2str($digit_degree),
                    'subject_id' => $subject->id,
                    'student_id' => $student->id,
                    'exam_id' => 1,
                    'can_do_exam' => $can_do_exam,
                    'is_success' =>  $is_success
                ]);
            }
        }
        ################################################################# // 2


        ### 3 ##### ادخال درجات طلاب السنة الاولى - الفصل الثاني ### 
        $students = Student::where('study_year_id', 1)->get();
        foreach ($students as $student) {
            $section_id = $student->section_id;
            $study_year_id = $student->study_year_id;

            $subjects = Subject::where('section_id', $section_id)->where('study_year_id', $study_year_id)->where('season', 'الثاني')->get();

            foreach ($subjects as $subject) {
                $practice_degree = $faker->numberBetween(7, $subject->practice);
                $exam_degree = $practice_degree >= ((40 * $subject->practice) / 100) ? $faker->numberBetween(30, 100 - $subject->practice) : 0;
                $can_do_exam = $practice_degree >= ((40 * $subject->practice) / 100) ? 1 : 0;
                $digit_degree = ($practice_degree + $exam_degree);
                $is_success = $digit_degree >= 60 ? true : false;
                Degree::create([
                    'practice' => $subject->practice,
                    'practice_degree' => $practice_degree,
                    'exam_degree' => $exam_degree,
                    'digit_degree' => $digit_degree,
                    'writen_degree' => $Arabic->int2str($digit_degree),
                    'subject_id' => $subject->id,
                    'student_id' => $student->id,
                    'exam_id' => 2,
                    'can_do_exam' => $can_do_exam,
                    'is_success' =>  $is_success
                ]);
            }
            // اعادة مواد الفصل الاول للمستحقين
            $degrees = Degree::where('exam_id', '<', '2')->where('can_do_exam', 1)->where('is_success', 0)->get();
            foreach ($degrees as $degree) {
                $exam_degree = $faker->numberBetween(0, 100 - $degree->practice);
                $digit_degree = ($degree->practice_degree + $exam_degree);
                $is_success = $digit_degree >= 60 ? true : false;
                $degree->update([
                    'exam_degree' => $exam_degree,
                    'digit_degree' => $digit_degree,
                    'writen_degree' => $Arabic->int2str($digit_degree),
                    'exam_id' => 2,
                    'is_success' =>  $is_success
                ]);
            }
            
        }

        ################################################################# // 3


        ### نقل الطلاب الناجحين للسنة التالية ### 4
        // من السنة الاولى الى السنة الثانية
        $students = Student::get();
        foreach ($students as $student) {
            $student->update([
                'number_of_remain_subjects' => Degree::where('student_id' , $student->id)->where('is_success' , 0)->get()->count()
            ]);
            if($student->number_of_remain_subjects < 5)
            $student->update([
                'study_year_id' => $student->study_year_id + 1,
                'number_of_remain_subjects' => ($student->number_of_remain_subjects + Subject::where('study_year_id', 2)->get()->count())
            ]);
        }

        ### 5 ### ادخال طلاب السنة الاولى الجدد  ###
        for ($i = 0; $i < $limit; $i++) {
            Student::create([
                'fname' => $faker->firstNameMale(),
                'lname' => $faker->firstNameMale(),
                'mname' => $faker->firstNameMale(),
                'moname' => $faker->firstNameFemale(),
                'u_number' => $faker->unique()->numberBetween(1000, 99999),
                'n_number' => '06' . $faker->unique()->numberBetween(10000000, 99999999),
                'faculty_id' => 1,
                'section_id' => 4,
                'study_year_id' => 1,
                'number_of_remain_subjects' => '11',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
        ##################################################### //5

        ### 6 ##### ادخال درجات طلاب السنة الاولى والثانية - الفصل الاول ### 
        // ادخال درجات سنة اولى وثانية مستجدين فصل اول
        $students = Student::get();
        foreach ($students as $student) {
            $section_id = $student->section_id;
            $study_year_id = $student->study_year_id;
            $subjects = Subject::where('section_id', $section_id)->where('study_year_id', $study_year_id)->where('season', 'الاول')->get();

            foreach ($subjects as $subject) {
                $practice_degree = $faker->numberBetween(7, $subject->practice);
                $exam_degree = $practice_degree >= ((40 * $subject->practice) / 100) ? $faker->numberBetween(30, 100 - $subject->practice) : 0;
                $digit_degree = ($practice_degree + $exam_degree);
                $can_do_exam = $practice_degree >= ((40 * $subject->practice) / 100) ? 1 : 0;
                $is_success = $digit_degree >= 60 ? true : false;
                // لفحص اذا الطالب كان راسب ويعيد المادة لعدم ادخالها مرة ثانية
                $degree_exist = Degree::where('subject_id', $subject->id)->where('student_id', $student->id)->first();
                if ($degree_exist) {
                    if (!$degree_exist->is_success) {
                        $degree_exist->update([
                            'practice' => $subject->practice,
                            'practice_degree' => $practice_degree,
                            'exam_degree' => $exam_degree,
                            'digit_degree' => $digit_degree,
                            'writen_degree' => $Arabic->int2str($digit_degree),
                            'exam_id' => 3,
                            'can_do_exam' => $can_do_exam,
                            'is_success' =>  $is_success
                        ]);
                    }
                } else {
                    Degree::create([
                        'practice' => $subject->practice,
                        'practice_degree' => $practice_degree,
                        'exam_degree' => $exam_degree,
                        'digit_degree' => $digit_degree,
                        'writen_degree' => $Arabic->int2str($digit_degree),
                        'subject_id' => $subject->id,
                        'student_id' => $student->id,
                        'exam_id' => 3,
                        'can_do_exam' => $can_do_exam,
                        'is_success' =>  $is_success
                    ]);
                }
                }
            // اعادة العملي مع امتحان النظري
            if ($student->study_year_id > 1) {
                $subjects = Subject::where('section_id', $section_id)->where('study_year_id', '<', $study_year_id)->where('season', 'الاول')->get();
                foreach ($subjects as $subject) {
                    $practice_degree = $faker->numberBetween(7, $subject->practice);
                    $exam_degree = $practice_degree >= ((40 * $subject->practice) / 100) ? $faker->numberBetween(30, 100 - $subject->practice) : 0;
                    $digit_degree = ($practice_degree + $exam_degree);
                    $can_do_exam = $practice_degree >= ((40 * $subject->practice) / 100) ? 1 : 0;
                    $is_success = $digit_degree >= 60 ? true : false;
                    $degree_exist = Degree::where('subject_id', $subject->id)->where('student_id', $student->id)->where('can_do_exam', '0')->first();
                    if ($degree_exist) {
                        $degree_exist->update([
                            'practice' => $subject->practice,
                            'practice_degree' => $practice_degree,
                            'exam_degree' => $exam_degree,
                            'digit_degree' => $digit_degree,
                            'writen_degree' => $Arabic->int2str($digit_degree),
                            'exam_id' => 3,
                            'can_do_exam' => $can_do_exam,
                            'is_success' =>  $is_success
                        ]);
                    }
                }
            }
        }
        ################################################################# // 6





        ### 7 ##### ادخال درجات طلاب السنة الاولى والثانية - الفصل الثاني ### 
        // ادخال درجات سنة اولى وثانية مستجدين فصل ثاني
        $students = Student::get();
        foreach ($students as $student) {
            $section_id = $student->section_id;
            $study_year_id = $student->study_year_id;
            $subjects = Subject::where('section_id', $section_id)->where('study_year_id', $study_year_id)->where('season', 'الثاني')->get();

            foreach ($subjects as $subject) {
                $practice_degree = $faker->numberBetween(7, $subject->practice);
                $exam_degree = $practice_degree >= ((40 * $subject->practice) / 100) ? $faker->numberBetween(30, 100 - $subject->practice) : 0;
                $digit_degree = ($practice_degree + $exam_degree);
                $can_do_exam = $practice_degree >= ((40 * $subject->practice) / 100) ? 1 : 0;
                $is_success = $digit_degree >= 60 ? true : false;
                // لفحص اذا الطالب كان راسب ويعيد المادة لعدم ادخالها مرة ثانية
                $degree_exist = Degree::where('subject_id', $subject->id)->where('student_id', $student->id)->first();
                if ($degree_exist) {
                    if (!$degree_exist->is_success) {
                        $degree_exist->update([
                            'practice' => $subject->practice,
                            'practice_degree' => $practice_degree,
                            'exam_degree' => $exam_degree,
                            'digit_degree' => $digit_degree,
                            'writen_degree' => $Arabic->int2str($digit_degree),
                            'exam_id' => 4,
                            'can_do_exam' => $can_do_exam,
                            'is_success' =>  $is_success
                        ]);

                    }
                } else {
                    Degree::create([
                        'practice' => $subject->practice,
                        'practice_degree' => $practice_degree,
                        'exam_degree' => $exam_degree,
                        'digit_degree' => $digit_degree,
                        'writen_degree' => $Arabic->int2str($digit_degree),
                        'subject_id' => $subject->id,
                        'student_id' => $student->id,
                        'exam_id' => 4,
                        'can_do_exam' => $can_do_exam,
                        'is_success' =>  $is_success
                    ]);

                }
            }
            // اعادة العملي مع امتحان النظري
            if ($student->study_year_id > 1) {
                $subjects = Subject::where('section_id', $section_id)->where('study_year_id', '<', $study_year_id)->where('season', 'الثاني')->get();
                foreach ($subjects as $subject) {
                    $practice_degree = $faker->numberBetween(7, $subject->practice);
                    $exam_degree = $practice_degree >= ((40 * $subject->practice) / 100) ? $faker->numberBetween(30, 100 - $subject->practice) : 0;
                    $digit_degree = ($practice_degree + $exam_degree);
                    $can_do_exam = $practice_degree >= ((40 * $subject->practice) / 100) ? 1 : 0;
                    $is_success = $digit_degree >= 60 ? true : false;
                    $degree_exist = Degree::where('subject_id', $subject->id)->where('student_id', $student->id)->where('can_do_exam', '0')->first();
                    if ($degree_exist) {
                        $degree_exist->update([
                            'practice' => $subject->practice,
                            'practice_degree' => $practice_degree,
                            'exam_degree' => $exam_degree,
                            'digit_degree' => $digit_degree,
                            'writen_degree' => $Arabic->int2str($digit_degree),
                            'exam_id' => 4,
                            'can_do_exam' => $can_do_exam,
                            'is_success' =>  $is_success
                        ]);

                    }
                }
            }
        }
        // اعادة مواد الفصل الاول للمستحقين
        $degrees = Degree::where('exam_id', '<', '4')->where('can_do_exam', 1)->where('is_success', 0)->get();
        foreach ($degrees as $degree) {
            $exam_degree = $faker->numberBetween(0, 100 - $degree->practice);
            $digit_degree = ($degree->practice_degree + $exam_degree);
            $is_success = $digit_degree >= 60 ? true : false;
            $degree->update([
                'exam_degree' => $exam_degree,
                'digit_degree' => $digit_degree,
                'writen_degree' => $Arabic->int2str($digit_degree),
                'exam_id' => 4,
                'is_success' =>  $is_success
            ]);
        }
        

        ################################################################# // 7

        $students = Student::get();
        foreach ($students as $student) {
            $student->update([
                'number_of_remain_subjects' => Degree::where('student_id' , $student->id)->where('is_success' , 0)->get()->count()
            ]);
            if($student->number_of_remain_subjects < 5)
            $student->update([
                'study_year_id' => $student->study_year_id + 1,
                'number_of_remain_subjects' => ($student->number_of_remain_subjects + Subject::where('study_year_id', 2)->get()->count())
            ]);
        }
    }
}
