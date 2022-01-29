<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    // public function login(Request $request)
    // {
    //     $user = User::where('email',$request->email)->first();
    //     if(!$user || !Hash::check($request->password,$user->password)){
    //         return response([
    //             'message'=>['Not a valid user']
    //         ],404);
            
    //     }
    //     $token = $user->createToken('may-aap-token')->plainTextToken;

    //     $response =[
    //         'user'=>$user,
    //         'token'=>$token
    //     ];
    //     return response($response,201);
    // }
    public function registration(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'c_password'=>'required|same:password',
        ]);
        if($validation->fails()){
            return response()->json($validation->errors(),202);
        }
        $allData =$request->all();
        $allData['password'] =bcrypt($allData['password']);

        $user = User::create($allData);

        $resArr =[];
        $resArr['token']=$user->createToken('api-application')->accessToken;
        $resArr['name']=$user->name;

        return response()->json($resArr,200);
    }
    public function login(Request $request)
    {
        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ])){
            $user = Auth::user();
            $resArr =[];
            $resArr['token']=$user->createToken('api-application')->accessToken;
            $resArr['name']=$user->name;
            return response()->json($resArr,200);
        }else{
            return response()->json(['error'=>'Unauthorized Access'], 203);
        }
    }
    public function logout (Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $response = ["message"=>"you have succesfully logout!!"];
        return response($response,200);
    }
}
