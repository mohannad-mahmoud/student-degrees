<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DegreesShowController extends Controller
{
    public function showAllDegrees(Request $request){
        $u_number = $request->u_number;
        $n_number = $request->n_number;
        // $studentWithDegrees = json_decode(Http::get("http://127.0.0.1:8000/api/student/get/$u_number/$n_number/degrees"))->data;
        $id = Student::where('u_number' , $u_number)->where('n_number' , $n_number)->first()->id;
        $studentWithDegrees = Student::with('degrees')->find($id);
        return view('degrees' , compact('studentWithDegrees'));
    }
}
