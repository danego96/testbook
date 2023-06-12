<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
