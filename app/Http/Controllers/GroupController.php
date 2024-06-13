<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Models\Group;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'table']);
    }

    public function index()
    {
        $groups = Group::sortable()->paginate(10);

        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GroupRequest $request)
    {
        Group::create($request->validated());

        return redirect()->route('groups.index')->with('success', 'Group added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        $students = $group->students()->paginate(10);

        return view('groups.show', compact('students', 'group'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        return view('groups.edit', ['group' => $group]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GroupRequest $request, Group $group)
    {
        $group->update($request->validated());

        return redirect()->route('groups.index')->with('success', 'Group edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()->route('groups.index')->with('error', 'Group deleted successfully');
    }

    public function table(Group $group)
    {
        $students = Student::where('group_id', $group->id)
            ->withAvg('marks', 'name')
            ->paginate(100);

        $subjects = Subject::all();

        $studentIds = $students->pluck('id');
        $averageMarks = Mark::whereIn('student_id', $studentIds)
            ->groupBy(['student_id', 'subject_id'])
            ->select('student_id', 'subject_id', DB::raw('ROUND(AVG(name),1) as average'))
            ->get();

        return view('groups.table', compact('group', 'students', 'subjects', 'averageMarks'));
    }
}
