<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use Illuminate\Http\Request;

class DegreeController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $degrees = Degree::get();
        return $this->apiResponse($degrees , 'success' , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $degree = Degree::create($request->all());
        return $this->apiResponse($degree , 'success' , '201');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $degree = Degree::find($id);
        return $this->apiResponse($degree , 'success' , '200');

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
        $degree = Degree::find($id)->update($request->all());
        return $this->apiResponse($degree , 'success' , '200');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $degree = Degree::find($id)->delete();
        return $this->apiResponse($degree , 'success' , '200');
    }

    public function subject($id){
        $subject = Degree::with('subject')->find($id);
        return $this->apiResponse($subject , 'success' , '200');
    }
    
    public function student($id){
        $subject = Degree::with('student')->find($id);
        return $this->apiResponse($subject , 'success' , '200');
    }
    
    public function exam($id){
        $subject = Degree::with('exam')->find($id);
        return $this->apiResponse($subject , 'success' , '200');
    }

}
