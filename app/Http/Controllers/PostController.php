<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result = Students::all();
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $student = new Students;
        $student->StudentName = $request->StudentName;
        $student->Email = $request->Email;
        $result = $student->save();
        if($result){
            return["result"=>"Student Added"];
        }else{
            return["result"=>"Student not Addded"];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($param)
    {
        //
        $student = Students:: where('StudentName','like',"%".$param."%")->get();
        return $student;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $student = Students::find($id);
        $result = $student->delete();
        if($result) {
            return ["result"=>"Student Deleted"];
        }else{
            return ["result"=>"Student Not Deleted"];
        }
    }
}
