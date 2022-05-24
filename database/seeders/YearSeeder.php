<?php

namespace Database\Seeders;

use App\Models\Year;
use Illuminate\Database\Seeder;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Year::create([
            'name' => '2017/2018'
        ]);
        Year::create([
            'name' => '2018/2019'
        ]);
        Year::create([
            'name' => '2019/2020'
        ]);
        Year::create([
            'name' => '2020/2021'
        ]);
        Year::create([
            'name' => '2021/2022'
        ]);
    }
}
