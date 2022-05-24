<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::get();
        return $this->apiResponse($faculties , 'success' , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faculty = Faculty::create($request->all());
        return $this->apiResponse($faculty , 'success' , '201');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faculty = Faculty::find($id);
        return $this->apiResponse($faculty , 'success' , '200');
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
        $faculty = Faculty::find($id)->update($request->all());
        return $this->apiResponse($faculty , 'success' , '200');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faculty = Faculty::find($id)->delete();
        return $this->apiResponse($faculty , 'success' , '200');
    }

    public function sections($id){
        $sections = Faculty::with('sections')->find($id);
        return $this->apiResponse($sections , 'success' , '200');
    }
    
    public function students($id){
        $students = Faculty::with('students')->find($id);
        return $this->apiResponse($students , 'success' , '200');
    }

}


