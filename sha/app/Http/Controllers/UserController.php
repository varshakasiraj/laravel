<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
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
        session()->put('user_login',$request->input('email'));
        if ($request->session()->has('user_login')) {
         return redirect()->route('admin_dashboard');
      }
    }
    else if(Auth::attempt(['email'=> $request->input('email'),'password'=>  $request->input('password'),
    'role_id'=>2])){
        session()->put('user_login',$request->input('email'));
        return redirect()->route('manager_dashboard');
    }
    else if(Auth::attempt(['email'=> $request->input('email'),'password'=>  $request->input('password'),
    'role_id'=>3])){
        session()->put('user_login',$request->input('email'));
        return redirect()->route('supervisor_dashboard');
    }
    else if(Auth::attempt(['email'=> $request->input('email'),'password'=>  $request->input('password'),
    'role_id'=>4])){
        $user = DB::table('users')->where('email',$request->input('email'))->get(); 
        session()->put('user_login',$request->input('email'));
        return view('industry.worker_dashboard')->with('user',$user);
    }
    else{
      return redirect()->route('error');
    }
  } 
  public function logout(){
    session()->forget('user_login');
    return redirect()->route('user_login');
  }
  public function workerProfile(){
      $user = DB::table('users')->where('role_id','4')->get();
      return view('industry.worker_singlepage')->with('user',$user);
  }
  public function managerProfile(){
    $user = DB::table('users')->where('role_id','2')->get();
    return view('industry.manager_singlepage')->with('user',$user);
  }
  public function adminProfile($id){
    $user = DB::table('users')->where('role_id',$id)->get();
    return view('industry.admin_singlepage')->with(['user'=>$user,'id'=>$id]);
  }
  public function editAdmin($id){
    $user = DB::table('users')->where('id',$id)->get();
    return view('industry.edit_admin')->with('user',$user);
  }
  public function  deleteAdmin($id){
    $user = DB::table('users')->delete($id);
    return redirect()->route('admin_dashboard');
  }
  public function updateProfile(Request $request){
    $user = DB::table('users')->where('id',$request->input('id'))->update(array(
      'name'=> $request->input('name'),
      'email'=>$request->input('email'),
      'password'=>$request->input('password'),
      'role_id'=>$request->input('role')
    ));
    return redirect()->route('admin_dashboard');
  }
  
}