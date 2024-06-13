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

        return view('marks.create', compact('subjects', 'marks', 'student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MarkRequest $request, Student $student)
    {
        $student->marks()->create($request->validated());

        return redirect()->route('students.show', ['student' => $student->id])->with('success', 'Mark has been created');
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

        return redirect()->route('students.show', ['student' => $student->id])->with('success', 'Mark has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student, Mark $mark)
    {
        $mark->delete();

        return redirect()->route('students.show', ['student' => $student->id])->with('error', 'Mark has been deleted');
    }
}
