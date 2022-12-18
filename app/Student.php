<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    //
    use SoftDeletes;
    protected $table = 'user';
   protected $fillable = ['id','name','fname','roll_no','lname','age','cnic','zip_code','email','phone_number','class','section','country','city','hieght','wieght','image','delete_at'];
  //  protected $fillable = ['first name'];

}
