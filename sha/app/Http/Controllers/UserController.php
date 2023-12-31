<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
class UserController extends Controller
{
  public function getDetails(Request $request){
    $validator = \Validator::make(request()->all(),[
      'title' => 'required|min:5',
      'email'=>'required',
      'password'=>'required'
    ]);
    if ($validator->fails()) {
      return response()->json([
          'errors' => $validator->errors(),
          'status' => Response::HTTP_OK,
      ], Response::HTTP_OK);
    }
    $name = $request->input('name');
    $email =  $request->input('email');
    $password = Hash::make($request->input('password'));
    $role_id = $request->input('role');
    User::create([
        'name'=>$name,
        'email'=>$email,
        'email_verified_at'=>now(),
        'password' =>$password,
        'role_id'=>$role_id
    ]);
    return response()->json([
        'message' => 'Successfully created user!'
        ],200);
  }
    
}
