<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students= Student::all();
      return view('home', ['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $Student= new Student;
        $Student->name=$request->name;
        $Student->city=$request->city;
        $Student->marks=$request->marks;
        $Student->save();
        return redirect(route('index'))->with('status','Students Added Sucessfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    public function edit($id)
    {
        $Student=Student::find($id);
        return view('editform ', ['Student'=>$Student]);
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
        $Student=Student::find($id);
        $Student->name=$request->name;
        $Student->city=$request->city;
        $Student->marks=$request->marks;
        $Student->save();
        return redirect(route('index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Student::destroy($id);
       return redirect(route('index'));

    }
}
