<?php

use App\Http\Controllers\Api\DegreeController;
use App\Http\Controllers\Api\ExamController;
use App\Http\Controllers\Api\FacultyController;
use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\StudyYearController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\YearController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('/faculty' , FacultyController::class );
Route::group(['prefix' => '/faculty'] , function(){
    Route::get('/get/{id}/sections' , [FacultyController::class , 'sections']);
});


Route::resource('/degree' , DegreeController::class );
Route::group(['prefix' => 'degree'] , function(){
    Route::get('/get/{id}/subject' , [DegreeController::class , 'subject']);
    Route::get('/get/{id}/student' , [DegreeController::class , 'student']);
    Route::get('/get/{id}/exam' , [DegreeController::class , 'exam']);
});


Route::resource('/exam' , ExamController::class );
Route::group(['prefix' => 'exam'] , function(){
    Route::get('/get/{id}/year' , [ExamController::class , 'year']);
    Route::get('/get/{id}/degrees' , [ExamController::class , 'degrees']);
});


Route::resource('/section' , SectionController::class );
Route::group(['prefix' => 'section'] , function(){
    Route::get('/get/{id}/faculty' , [SectionController::class , 'faculty']);
    Route::get('/get/{id}/subjects' , [SectionController::class , 'subjects']);
});


Route::resource('/student' , StudentController::class );
Route::group(['prefix' => 'student'] , function(){
    Route::get('/get/{id}/faculty' , [StudentController::class , 'faculty']);
    Route::get('/get/{id}/section' , [StudentController::class , 'section']);
    Route::get('/get/{id}/study-year' , [StudentController::class , 'studyYear']);
    Route::get('/get/{id}/degrees' , [StudentController::class , 'degrees']);

    Route::get('/get/{u_number}/{n_number}/degrees' , [StudentController::class , 'degreesUsingNU']);
});


Route::resource('/subject' , SubjectController::class );
Route::group(['prefix' => 'subject'] , function(){
    Route::get('/get/{id}/study-year' , [SubjectController::class , 'studyYear']);
    Route::get('/get/{id}/degree' , [SubjectController::class , 'degree']);
});

Route::resource('/year' , YearController::class );
Route::group(['prefix' => 'year'] , function(){
    Route::get('/get/{id}/exams' , [YearController::class , 'exams']);
});

Route::resource('/study-year' , StudyYearController::class );
Route::group(['prefix' => 'study-year'] , function(){
    Route::get('/get/{id}/subjects' , [StudyYearController::class , 'subjects']);
    Route::get('/get/{id}/subjects/{season}' , [StudyYearController::class , 'subjectsSeason']);
});
