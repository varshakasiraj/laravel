<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customerAddress extends Model
{
    use HasFactory;
    protected $table = 'customer_address';
    protected $guarded = ['id'];
    protected function structure()
    {
     return $this->belongsTo(customerAddress::class,'customer_id','id');
    }
}
