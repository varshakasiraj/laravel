<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
    ];
    public $id;
    public $firstname;
    public $lasttname;
    public $email;
    public $password;
    public function insert($firstname,$lasttname,$email,$password){
        DB::table('Student')->insert(array(
            'firstname'=> $firstname,
            'lasttname'=> $lasttname,
            'email'=>$email,
            'password'=>$password,
                 
        ));
    }
    
    public function updates($id,$firstname,$lasttname,$email,$password){
        DB::table('Student')->where('id',$id)->update(array(
            'firstname'=> $firstname,
            'lasttname'=> $lasttname,
            'email'=>$email,
            'password'=>$password,       
        ));
    }
    public function view(){
        return DB::select('select * from student');
    }
    public function remove($id){
        return DB::table('Student')->delete($id);
    }
    public function selectById($id){
        return DB::select('select * from student where id="'.$id.'"');
    }
    
}
