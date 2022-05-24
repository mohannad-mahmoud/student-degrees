<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::get();
        return $this->apiResponse($students , 'success' , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = Student::create($request->all());
        return $this->apiResponse($student , 'success' , '201');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return $this->apiResponse($student , 'success' , '200');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id)->update($request->all());
        return $this->apiResponse($student , 'success' , '200');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id)->delete();
        return $this->apiResponse($student , 'success' , '200');
    }

    public function faculty($id){
        $faculty = Student::with('faculty')->find($id);
        return $this->apiResponse($faculty , 'success' , '200');
    }
    
    public function section($id){
        $faculty = Student::with('section')->find($id);
        return $this->apiResponse($faculty , 'success' , '200');
    }
    
    public function studyYear($id){
        $faculty = Student::with('studyYear')->find($id);
        return $this->apiResponse($faculty , 'success' , '200');
    }
    
    public function degrees($id){
        $degrees = Student::with('degrees')->find($id);
        return $this->apiResponse($degrees , 'success' , '200');
    }

    public function degreesUsingNU($u_number , $n_number){
        // dd(Student::where('u_number' , $u_number)->where('n_number' , $n_number)->first());
        $id = Student::where('u_number' , $u_number)->where('n_number' , $n_number)->first()->id;
        $degrees = Student::with('degrees')->find($id);
        return $this->apiResponse($degrees , 'success' , '200');
    }

}
