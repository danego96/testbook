<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
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
    public function index()
    {
        $groups = Group::sortable()->paginate(10);

        return view('groups.index', ['groups' => $groups]);
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
    public function store(StoreGroupRequest $request)
    {
        $group = new Group();
        $group->name = $request->input('name');
        $group->save();

        return redirect('/groups')->with('success', 'Group added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {

        $student = Student::where('group_id', $group->id)->paginate(10);

        return view('groups.show', ['group_data' => $group->name, 'data' => $student, 'group' => $group]);
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
    public function update(UpdateGroupRequest $request, Group $group)
    {

        $group->name = $request->input('name');
        $group->save();

        return redirect('/groups')->with('success', 'Group edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->delete();

        return redirect('/groups')->with('error', 'Group deleted successfully');
    }

    public function show_table(Group $group)
    {
        $students = Student::where('group_id', $group->id)->paginate(10);
        $subjects = Subject::all();

        $studentIds = $students->pluck('id');
        $average_marks = Mark::whereIn('student_id', $studentIds)
            ->groupBy(['student_id', 'subject_id'])
            ->select('student_id', 'subject_id', DB::raw('ROUND(AVG(name),1) as average'))
            ->get();

        $averageTotalMarks = Mark::whereIn('student_id', $studentIds)
            ->groupBy('student_id')
            ->select('student_id', DB::raw('ROUND(AVG(name),1) as average'))
            ->get();

        return view('groups.show_table', compact('group', 'students', 'subjects', 'average_marks', 'averageTotalMarks'));

    }
}
