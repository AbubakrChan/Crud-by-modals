<?php

namespace App\Http\Controllers;
//
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Nexmo\Response;
use App\User;
use App\mymodel;
use function GuzzleHttp\Promise\all;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function insert(Request $req){
$req->validate([
    'name' => 'required',
    'email' => 'required|email',
    'password' => 'required|min:5'

]);

        $user  = new mymodel();

        $user->name =$req->name;
        $user->email =$req->email;
        $user->password =$req->password;

        $user->save();



       // return view("crudbymodalview");

    }
    function delete(Request $request ){

        mymodel::find($request->id)->delete($request->id);

    }
    function edit(Request $req){
        $newuser = mymodel::find($req->id);
        $newuser->name = $req->name;
        $newuser->email = $req->email;
        $newuser->password= $req->password;

        $newuser->save();

        //header("Refresh:1");
       // return view('crudbymodalview');

    }

}
//    function insert(Response $req){
//
//
//    }

function unique_email_check($email){
    $data = mymodel::all();
    foreach ($data as $mydata) {
        if ($mydata->email === $email){
            echo "Email already exist!";
            return false;
        }
    }
    return true ;
}
