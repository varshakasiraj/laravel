<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
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
            'password' => Hash::make($request->input('password')),
        ]);
        $tokenResult = $Student->createToken($request->input('email'));
        $token = $tokenResult->plainTextToken;
        return response()->json([
            'message' => 'Successfully created user!',
            'accessToken'=> $token,
            ],201);
    }
    public function  checklogin(Request $request){
        $Student = new Student();
        $email =  $request->input('email');
        $password =$request->input('password');
        $db_data = $Student->view();
        foreach($db_data as $data){
            if($email == $data->email && (Hash::check($password,$data->password))){
                session()->put('user_details',$data->email);
                return redirect()->route('cms');
            }
        }
    }
    public function getprofile(){
       $Student = new Student();
       $user_email = session('user_details');
       $user_details= $Student->getByEmail($user_email);
       return view('profile',compact('user_details'));
    }
    public function profileEdit($id){
        $Student = new Student();
        $edit_profile = $Student->selectById($id);
        return view('profileEdit',compact('edit_profile'));
     }
    public function logout($id){
        session()->forget('user_details');
        return redirect()->route('login');
    }
    public function profileUpdate(Request $request){

        $Student = new Student();
        $name  = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $Student->updates($request->input('id'),$name,$email,$password);
        return redirect()->route('cms');
    }
}