<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarkRequest;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function create(Student $student)
    {
        $marks = Mark::valueList();
        $subjects = Subject::all();

        return view('marks.create', ['subjects' => $subjects, 'marks' => $marks, 'student' => $student]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MarkRequest $request, Student $student)
    {
        $mark = $request->validated();
        $mark['student_id'] = $student->id;

        Mark::create($mark);

        return redirect('/students/' . $student->id)->with('success', 'Mark has been created');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student, Mark $mark)
    {
        $marks = Mark::valueList();

        return view('marks.edit', compact('mark', 'student', 'marks'));
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
        $mark->delete();

        return redirect('/students/' . $student->id)->with('error', 'Mark has been deleted');
    }
}
