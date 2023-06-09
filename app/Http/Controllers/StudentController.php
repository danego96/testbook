<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Group;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = new Student;
        $group = Group::all();
        return view('students.index', ['data'=>$student->paginate(10), 'group_data'=>$group]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $group = Group::all();
        return view('students.create',['data'=>$group]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = new Student();
        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->birth_date = $request->input('birth_date');
        $student->group_id = $request->input('group_id');
        $student -> save();

        return redirect('/students');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $subject = Subject::all();
        $groups = Group::all();
        $mark = Mark::where('student_id', $student->id)->get();
        $average = Mark::where('student_id', $student->id)
        ->groupBy('subject_id')
        ->select('subject_id', DB::raw('ROUND(AVG(name),1) as average'))
        ->get();

    return view('students.show', ['data'=>$subject, 'student'=>$student, 'groups'=>$groups, 'marks'=>$mark, 'average'=>$average]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
       
        $group = Group::all();
        return view('students.edit', ['student'=>$student, 'data'=>$group]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->birth_date = $request->input('birth_date');
        $student->group_id = $request->input('group_id');
        $student->save();

        return redirect('/students')->with('success', 'Student details updated correctly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect('/students')->with('error', 'Student '. $student->name .' '. $student->surname . ' has been deleted');
    }
}
