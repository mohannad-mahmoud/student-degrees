<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::get();
        return $this->apiResponse($subjects , 'success' , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subject = Subject::create($request->all());
        return $this->apiResponse($subject , 'success' , '201');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::find($id);
        return $this->apiResponse($subject , 'success' , '200');

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
        $subject = Subject::find($id)->update($request->all());
        return $this->apiResponse($subject , 'success' , '200');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id)->delete();
        return $this->apiResponse($subject , 'success' , '200');
    }

    public function studyYear($id){
        $studyYear = Subject::with('studyYear')->find($id);
        return $this->apiResponse($studyYear , 'success' , '200');
    }
    
    public function degree($id){
        $degree = Subject::with('degree')->find($id);
        return $this->apiResponse($degree , 'success' , '200');
    }

}
