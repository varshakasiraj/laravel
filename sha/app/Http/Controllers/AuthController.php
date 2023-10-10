<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Student;
class AuthController extends Controller
{
    /**
    * Create user
    *
    * @param  [string] name
    * @param  [string] email
    * @param  [string] password
    * @param  [string] password_confirmation
    * @return [string] message
    */
    public function register(Request $request)
    {
        $Student = Student::create([
            'name'  => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);
        $tokenResult = $Student->createToken('Personal Access Token');
        $token = $tokenResult->plainTextToken;
        return response()->json([
            'message' => 'Successfully created user!',
            'accessToken'=> $token,
            ],201);
    }
    public function  checklogin(Request $request){
        $Student= new Student();
        $email =  $request->input('email');
        $password = $request->input('password');
        $db_data = $Student->view();
        foreach($db_data as $data){
            if($email==$data->email){
                echo"hi";
            }
            else{
                echo"bye";
            }
        }
        dd($data->email);
    }
}