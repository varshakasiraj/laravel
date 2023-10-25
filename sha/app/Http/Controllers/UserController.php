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
      'name' => 'required|min:4',
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
    $state = $request->input('state');
    $city = $request->input('city');
    $pincode = $request->input('pincode');
    $address = $request->input('address');
    User::create([
        'name'=>$name,
        'email'=>$email,
        'email_verified_at'=>now(),
        'password' =>$password,
        'role_id'=>$role_id
    ]);
    $user_id = DB::table('users')->select('id')->latest('id')->first();
    DB::table('worker_location')->insert(array(
        'user_id'=>$user_id->id,
        'state'=> $state,
        'city' => $city,
        'address'=>$address,
        'pincode'=>$pincode,
    ));
    session()->put('user_login',$user_id->email);
    return redirect()->route('worker_dashboard');
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
        session()->put('user_login',$request->input('email'));
        return redirect()->route('worker_dashboard');
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
    $user_email = session('user_login');
    $user = DB::table('users')->where('email',$user_email)->get();
    return view('industry.worker_singlepage')->with('user',$user);
     
  }
  public function workerLocation(){
    $user_email = session('user_login');
    $location = DB::table('users')->leftJoin('worker_location','users.id','=','worker_location.user_id')->where('email',$user_email)->get();
    return view('industry.location_page')->with('location',$location);
  }
  public function editWorkerSalary(){
    $salary = DB::table('users')->leftJoin('worker_salary','users.id','=','worker_salary.user_id')->where('role_id',4)->get();
    return view('industry.salary_page')->with('salary',$salary);
  }
  public function editSalaryForm($id){
    $editSalary= DB::table('worker_salary')->where('id',$id)->get();
    return view('industry.salary_page')->with('editSalary',$editSalary);
  }
  public function updateSalary(Request $request){
   $id = $request->input('id');
   $monthly_salary = $request->input('monthly_salary');
   $annual_salary = $request->input('annual_salary');
   DB::table('worker_salary')->where('id',$id)->update(array(
    'monthly_salary'=> $monthly_salary,
    'annual_salary'=>$annual_salary));
    return redirect()->route('admin_dashboard');
  }
  public function editadminSalary(){
    $location = DB::table('users')->leftJoin('worker_location','users.id','=','worker_location.user_id')->where('role_id',1)->get();
    return view('industry.location_page')->with('location',$location);
  }
  public function editworkerLocation(){
    $location = DB::table('users')->leftJoin('worker_location','users.id','=','worker_location.user_id')->where('role_id',4)->get();
    return view('industry.location_page')->with('location',$location);
  }
  public function editLocationForm($id){
    $location = DB::table('worker_location')->where('id',$id)->get(); 
    return view('industry.location_page')->with('editlocation',$location);                      
  }
  public function updateLocation(Request $request){
    DB::table('worker_location')->where('id',$request->input('id'))->update(array(
      'state'=> $request->input('state'),
      'city'=>$request->input('city'),
      'address'=>$request->input('address'),
      'pincode'=>$request->input('pincode')
    ));
    return redirect(asset('industry/workerlocation'));
  }
  public function workerSalary(){
    $user_email = session('user_login');
    $salary = DB::table('users')->leftJoin('worker_salary','users.id','=','worker_salary.user_id')->where('email',$user_email)->get();
    return view('industry.salary_page')->with('salary',$salary);
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
    DB::table('users')->where('id',$request->input('id'))->update(array(
      'name'=> $request->input('name'),
      'email'=>$request->input('email'),
      'password'=>$request->input('password'),
      'role_id'=>$request->input('role')
    ));
    return redirect()->route('admin_dashboard');
  }
  
}