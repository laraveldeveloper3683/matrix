<?php

namespace App\Http\Controllers;
use App\Student;
use App\University;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {

        $students = Student::with('university')->paginate(5);
        return view('student.index' , compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $universties = University::all();
        return view('student.create',compact('universties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
      Student::create($request->all());
      return redirect('/students');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $student = Student::find($id);
      $university = University::all();
      return view('student.edit' , compact('student' , 'university'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
         $student = Student::find($id);
         $student->first_name = $request->first_name;
         $student->last_name  = $request->last_name;
         $student->email = $request->email;
         $student->phone = $request->phone;
         $student->university_id = $request->university_id;
         $student->save();
         return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $student = Student::find($id);
      $student->delete();
      return redirect('/students');
    }
}
