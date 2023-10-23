<?php

namespace App\Models;
use Laravel\Sanctum\HasApiTokens;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Illuminate\Validation;
class Student extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasApiTokens;
    protected $table = 'student';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public $id;
    public $name;
    public $email;
    public $password;
    // public function insert($name,$email,$password){
    //     DB::table('Student')->insert(array(
    //         'name'=> $name,
    //         'email' => $email,
    //         'password'=>$password,
                 
    //     ));
    // }
    
    public function updates($id,$name,$email,$password){
        DB::table('Student')->where('id',$id)->update(array(
            'name'=> $name,
            'email'=>$email,
            'password'=>$password,       
        ));
    }
    public function view(){
        return DB::table('Student')->get();
    }
    public function remove($id){
        return DB::table('Student')->delete($id);
    }
    public function selectById($id){
        return DB::table('Student')->where('id',$id)->get();
    }
    public function getByEmail($email){
        return DB::table('Student')->where("email",$email)->get();
    }
    
}
