<?php

namespace Database\Seeders;

use App\Models\Student;
use Faker\Factory;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $limit = 600;

        for ($i = 0; $i < $limit; $i++) {
            Student::create([
                'fname' => $faker->firstNameMale(),
                'lname' => $faker->firstNameMale(),
                'mname' => $faker->firstNameMale(),
                'moname' => $faker->firstNameFemale(),
                'u_number' => $faker->unique()->numberBetween(1000 , 99999),
                'n_number' => '06' . $faker->unique()->numberBetween(10000000 , 99999999),
                'faculty_id' => 1,
                'section_id' => 4,
                'study_year_id' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
