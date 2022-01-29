<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestAPIController extends Controller
{
    //
    public function firstAPI()
    {
        //return "response from Controller";
        return ["name"=>'Bishal',"email"=>'bishalneon5@gmail.com'];
    }
}
 