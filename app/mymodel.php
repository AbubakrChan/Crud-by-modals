<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class mymodel extends Model
{
    //
    protected $table = 'user';
    protected $fillable = ['id','name','email','phone','addess'];


}
