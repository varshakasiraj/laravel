<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
  public function registerLogin(Request $request){
    $validator = \Validator::make(request()->all(),[
      'name' => 'required|min:5',
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
        'message' => 'Successfully created user!',
        'status' => Response::HTTP_OK,
        ],200);
  }
  public function login(Request $request){
    if(Auth::attempt(['email'=> $request->input('email'),'password'=>  $request->input('password'),
    'role_id'=>1])){
        return redirect()->route('admin_dashboard');
    }
    else if(Auth::attempt(['email'=> $request->input('email'),'password'=>  $request->input('password'),
    'role_id'=>2])){
        return redirect()->route('worker_dashboard');
    }
    else if(Auth::attempt(['email'=> $request->input('email'),'password'=>  $request->input('password'),
    'role_id'=>3])){
        return redirect()->route('worker_dashboard');
    }
    else if(Auth::attempt(['email'=> $request->input('email'),'password'=>  $request->input('password'),
    'role_id'=>4])){
        return redirect()->route('worker_dashboard');
    }
    else{
      return redirect()->route('user_register');
    }
  } 
  public function workerProfile(){
      $user = DB::table('users')->where('role_id','4')->get();
      return view('industry.profile')->with('user',$user);
  }
}