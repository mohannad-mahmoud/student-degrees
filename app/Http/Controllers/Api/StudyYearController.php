<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StudyYear;
use Illuminate\Http\Request;

class StudyYearController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studyYears = StudyYear::get();
        return $this->apiResponse($studyYears , 'success' , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $studyYear = StudyYear::create($request->all());
        return $this->apiResponse($studyYear , 'success' , '201');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $studyYear = StudyYear::find($id);
        return $this->apiResponse($studyYear , 'success' , '200');

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
        $studyYear = StudyYear::find($id)->update($request->all());
        return $this->apiResponse($studyYear , 'success' , '200');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studyYear = StudyYear::find($id)->delete();
        return $this->apiResponse($studyYear , 'success' , '200');
    }

    public function subjects($id){
        $subjects = StudyYear::with('subjects')->find($id);
        return $this->apiResponse($subjects , 'success' , '200');
    }

    public function subjectsSeason($id , $season){
        $GLOBALS['season'] = $season;
        $subjects = StudyYear::with(['subjects' => function($q){$q->where('season' , $GLOBALS['season']);}])->find($id);
        return $this->apiResponse($subjects , 'success' , '200');
    }

    public function students($id){
        $students = StudyYear::with('students')->find($id);
        return $this->apiResponse($students , 'success' , '200');
    }
}
