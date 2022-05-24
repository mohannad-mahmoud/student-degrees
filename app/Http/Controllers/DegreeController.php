<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DegreeController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('degree.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('degree.create');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('degree.edit');
    }


    public function showAllDegrees(Request $request){
        $u_number = $request->u_number;
        $n_number = $request->n_number;
        $studentWithDegrees = json_decode(Http::get("http://127.0.0.1:8000/api/student/get/$u_number/$n_number/degrees"))->data;
        return $studentWithDegrees;
    }
}
