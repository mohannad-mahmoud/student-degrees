<?php

use App\Http\Controllers\DegreeController;
use App\Http\Controllers\DegreesShowController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\YearController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// Faculty
Route::group(['prefix' => 'faculty'] , function(){
    Route::get('/' , [FacultyController::class , 'index'])->name('faculty.index');
    // Route::post('/' , [FacultyController::class , 'store'])->name('faculty.store');
    Route::get('/{id}/edit' , [FacultyController::class , 'edit'])->name('faculty.edit');
    Route::get('/create' , [FacultyController::class , 'create'])->name('faculty.create');
    // Route::post('/{id}/update' , [FacultyController::class , 'update'])->name('faculty.update');
    // Route::post('/{id}/destroy' , [FacultyController::class , 'destroy'])->name('faculty.destroy');
});

// Section 
Route::group(['prefix' => 'section'] , function(){
    Route::get('/' , [SectionController::class , 'index'])->name('section.index');
    Route::get('/{id}/edit' , [SectionController::class , 'edit'])->name('section.edit');
    Route::get('/create' , [SectionController::class , 'create'])->name('section.create');
});

// Year
Route::group(['prefix' => 'year'] , function(){
    Route::get('/' , [YearController::class , 'index'])->name('year.index');
    Route::get('/{id}/edit' , [YearController::class , 'edit'])->name('year.edit');
    Route::get('/create' , [YearController::class , 'create'])->name('year.create');
});


// Exam
Route::group(['prefix' => 'exam'] , function(){
    Route::get('/' , [ExamController::class , 'index'])->name('exam.index');
    Route::get('/{id}/edit' , [ExamController::class , 'edit'])->name('exam.edit');
    Route::get('/create' , [ExamController::class , 'create'])->name('exam.create');
});

// Subject
Route::group(['prefix' => 'subject'] , function(){
    Route::get('/' , [SubjectController::class , 'index'])->name('subject.index');
    Route::get('/{id}/edit' , [SubjectController::class , 'edit'])->name('subject.edit');
    Route::get('/create' , [SubjectController::class , 'create'])->name('subject.create');
});

// Student
Route::group(['prefix' => 'student'] , function(){
    Route::get('/' , [StudentController::class , 'index'])->name('student.index');
    Route::get('/{id}/edit' , [StudentController::class , 'edit'])->name('student.edit');
    Route::get('/create' , [StudentController::class , 'create'])->name('student.create');
});

// Degree
Route::group(['prefix' => 'degree'] , function(){
    Route::get('/' , [DegreeController::class , 'index'])->name('degree.index');
    Route::get('/{id}/edit' , [DegreeController::class , 'edit'])->name('degree.edit');
    Route::get('/create' , [DegreeController::class , 'create'])->name('degree.create');
});

// Degrees Show
    Route::post('/show-degrees' , [DegreesShowController::class , 'showAllDegrees'])->name('show.degrees');


Route::get('/{page}' , 'AdminController@index');

