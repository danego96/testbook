<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Student $student)
    {
        $mark = range(5,1);
        $subject = Subject::all();
        return view('marks.create', ['data'=>$subject, 'marks'=>$mark, 'student'=>$student]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Student $student)
    {
        $mark= new Mark();
        $mark->name = $request->input('name');
        $mark->subject_id = $request->input('subject_id');
        $mark->student_id = $student->id;

        $mark->save();

        return redirect('/students')->with('success', 'Mark has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mark $mark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student, Mark $mark)
    {
    

        $markList = range(5,1);

        return view('marks.edit', ['mark'=>$mark, 'student'=>$student,'markList'=>$markList] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student, Mark $mark)
    {

        $mark->name = $request->input('name');


        $mark->save();
        return redirect('/students/' . $student->id)->with('success', 'Mark has been updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student, Mark $mark)
    {
        $mark ->delete();

        return redirect('/students/' . $student->id)->with('error', 'Mark has been deleted');
    }
}
