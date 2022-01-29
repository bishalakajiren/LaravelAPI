<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;

class FileUploadController extends Controller
{
    //
    public function FileUpload(Request $request)
    {
        $uploaded_files = $request->file->store('public/files/');
        $student = new Students;
        $student->StudentName = $request->StudentName; 
        $student->Email = $request->Email;
        $student->student_image = $request->file->hashName();
        $results= $student->save();
        if($results){
            return["result"=>"Student Added"];
        }else {
            return["result"=>"Student Not Added"];
        }
        
    }
}
