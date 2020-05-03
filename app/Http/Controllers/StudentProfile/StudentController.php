<?php

namespace App\Http\Controllers\StudentProfile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Auth;


class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::Find(Auth::user()->id);
        dd($student->student_classes->load('class.material'));
        return view('student-profile.students.index', compact('student'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('profiles.students.index');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function studentPlan()
    {
        
        return view('student-profile.students.plan');
    }


    public function studentSemesters()
    {
        
        return view('student-profile.students.semesters');
    }
    
    public function studentShowMarks()
    {
        
        return view('student-profile.students.show-marks');
    }

    public function studentShowMaterials()
    {
        
        return view('student-profile.students.show-materials');
    }
    
    

    
}
