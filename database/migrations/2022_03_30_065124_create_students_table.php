<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('mname');
            $table->string('moname');
            $table->string('u_number')->unique();
            $table->string('n_number')->unique();
            $table->unsignedBigInteger('faculty_id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('study_year_id');
            $table->string('number_of_remain_subjects');

            $table->string('national_exam_degree')->nullable();
            $table->date('national_exam_taken')->nullable();
            $table->string('national_exam_name')->nullable();
            
            $table->timestamps();
            // $table->unsignedBigInteger('created_by')->nullable();
            // $table->unsignedBigInteger('updated_by')->nullable();
            // $table->unsignedBigInteger('deleted_by')->nullable();
            // $table->foreign('created_by')->references('id')->on('users');
            // $table->foreign('updated_by')->references('id')->on('users');
            // $table->foreign('deleted_by')->references('id')->on('users');
            $table->foreign('faculty_id')->references('id')->on('faculties');
            $table->foreign('section_id')->references('id')->on('sections');
            $table->foreign('study_year_id')->references('id')->on('study_years');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
