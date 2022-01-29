<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;

class StudentController extends Controller
{
    //
    public function getStudents($id=null)
    {
        if($id) {
        $students = Students::find($id);
        } else {
            $students = Students::all();
        }
        return $students;
      
    }
    
    public function addStudents(Request $request)
    {
        
        $student = new Students;
        $student->StudentName =$request->StudentName;
        $student->Email =$request->Email;
        $result = $student->save();
        if($result){
            return["result"=>"Student data Saved "];
        }else{
            return["result"=>"Student data not Saved "];
        }
    }
    public function updateStudents(Request $request){
        $student = Students::find($request->id);
        $student->StudentName = $request->StudentName;
        $student->Email = $request->Email;
        $result =$student->save();
        if($result){
            return["result"=>"Student data Updated "];
        }else{
            return["result"=>"Student data not Updated "];
        }
        
    }

    public function deleteStudents($id)
    {
        $student = Students::find($id);
        $result = $student->delete();
        if($result) {
            return ["result"=>"Student Deleted"];
        }else{
            return ["result"=>"Student Not Deleted"];
        }
    }

    public function searchStudents($param)
    {
        $student = Students:: where('StudentName','like',"%".$param."%")->get();
        return $student;
    }
} 

