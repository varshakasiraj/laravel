<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
class StudentController extends Controller
{
    public function create():View
    {
        return view('student');
    }
    public function insert(Request $request)
    {
        $student = new Student();
        $firstname = $request->input('fname');
        $lasttname = $request->input('lname');
        $email = $request->input('email');
        $password = $request->input('password');
        $student->insert($firstname,$lasttname, $email,$password);
        return view('/student');
    }
    public function select():View
    {
        $student = new Student();
        $view = $student->view() ;
        return view('student')->with(array('viewtable'=> $view));
    }
    public function delete($id){
        $student = new Student();
        $delete_id = [$id];
        $student->remove($delete_id) ;
    }
    public function edit($id){
        $student = new Student();
        $student_deatails = $student->selectById($id);
        return view('edit')->with(array('student_deatails'=> $student_deatails));
    }
    public function update(Request $request){
        $student = new Student();
        $id = $request->input('id');
        $firstname = $request->input('fname');
        $lasttname = $request->input('lname');
        $email = $request->input('email');
        $password = $request->input('password');
        $student->updates($id,$firstname,$lasttname, $email,$password);
    }
}
