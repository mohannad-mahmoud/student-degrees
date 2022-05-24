<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::get();
        return $this->apiResponse($sections , 'success' , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $section = Section::create($request->all());
        return $this->apiResponse($section , 'success' , '201');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $section = Section::find($id);
        return $this->apiResponse($section , 'success' , '200');

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
        $section = Section::find($id)->update($request->all());
        return $this->apiResponse($section , 'success' , '200');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Section::find($id)->delete();
        return $this->apiResponse($section , 'success' , '200');
    }

    public function faculty($id){
        $faculty = Section::with('faculty')->find($id);
        return $this->apiResponse($faculty , 'success' , '200');
    }

    public function subjects($id){
        $subjects = Section::with('subjects')->find($id);
        return $this->apiResponse($subjects , 'success' , '200');
    }

    public function students($id){
        $students = Section::with('students')->find($id);
        return $this->apiResponse($students , 'success' , '200');
    }

}
