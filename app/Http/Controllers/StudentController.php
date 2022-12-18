<?php

namespace App\Http\Controllers;
//namespace App\Http\Controllers\Auth;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Country;

//use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */

    public function index()
    {

        $index = 0;
        $data = Student::all();
//        $data = Student::all();
//        $countries = Country::all();
//        return view('insert', ['data' =>$Studennt_data ,"$countries"=>$countries]);
        return view('index', ['Students' => $data, 'index' => $index]);
//            ->with('countries',$countries);
    }

    public function create($roll_no)
    {

//        $last_roll_no = Student::latest('id')->withTrashed()->first();
//        $latest_roll_no = ($last_roll_no) ? 'STD-' . ($last_roll_no->id + 1) : 'STD-1';
////        $last3 = DB::table('user')->insertGetId(
//            [ 'name' => 'first' ]
//        );
        //dd($latest_roll_no);

        $countries = Country::all();
//        print_r($last3);
        return view('insert', ["countries" => $countries , 'roll_no'=>$roll_no]  );

    }

    public function store(Request $req)
    {



        $image = " ";
        if ($req->image) {
            $image = time() . '.' . $req->image->extension();
            $req->image->move(public_path('uploads'), $image);
        }
        // explode name here with space
        // get array
        //fname index[0]
        //lname every other index '' or null
        // difference between '' and null

        $name_pieces = explode(" ", $req->name);
        $lastname = '';
        foreach ($name_pieces as $k => $val) {
            if ($k) {
                $lastname = $lastname . $val;
            } else {
                $lastname = null;
            }
        }

       $tt= student::create([

            'roll_no' => $req->roll_no,
            'name' => $req->name,
            'fname' => $name_pieces[0],
            'lname' => $lastname,
            'age' => $req->age,
            'class' => $req->class,
            'section' => $req->section,
            'city' => $req->city,
            'country' => $req->country,
            'zip_code' => $req->zip_code,
            'phone_number' => $req->phone_number,
            'wieght' => $req->wieght,
            'hieght' => $req->hieght,
            'email' => $req->email,
            'cnic' => $req->cnic,
            'image' => $image,
        ]);
        $index = 0 ;
        $data = Student::all();
        return view('index', ['Students' => $data,'roll_no'=>$tt->id , 'index' => $index]  );

//
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mydata = student::find($id);
        return view('detail', ['data' => $mydata]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mydata = student::find($id);
        return view('edit', ['data' => $mydata]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $req
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $req)
    {
        $data_1 = student::where('id', $req->id)->first();
        $data = [
            'name' => $req->name,
            'age' => $req->age,
            'class' => $req->class,
            'section' => $req->section,
            'city' => $req->city,
            'country' => $req->country,
            'zip_code' => $req->zip_code,
            'phone_number' => $req->phone_number,
            'wieght' => $req->wieght,
            'hieght' => $req->hieght,
            'email' => $req->email,
            'cnic' => $req->cnic,
//            'image'=>$req->image,
        ];
        $data_1->update($data);

        return Redirect::to('http://localhost:8000/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $student = student::find($id);
        $student->delete();
        return redirect('home');
    }

}
