<?php

namespace App\Http\Controllers;
use App\University;
use Illuminate\Http\Request;
use App\Http\Requests\UniversityRequest;
use DB;
use Mail;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $universities  = DB::table('universities')->paginate(5);
      return view('university.index' , compact('universities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('university.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UniversityRequest $request)
    {

        $path = $request->file('logo')->store('public');
        $name = $request->file('logo')->hashName();
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['logo_path'] = $name;
        $data['website'] =  $request->website;
        University::create($data);
        Mail::to('matrixmtestcandidate@mailinator.com')->send(new \App\Mail\University());
        return redirect('/university');
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
      $student = University::find($id);
      return view('university.edit' , compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $path = "";
      if($request->hasFile('logo')){
        $path = $request->file('logo')->store('public');
      };
      $student = University::find($id);
      $student->name = $request->name;
      $student->email  = $request->email;
      if($path){
      $student->logo_path = $path;
      }
      $student->website = $request->website;
      $student->save();
      return redirect('/university');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $student = University::find($id);
      $student->delete();
      return redirect('/university');
    }
}
