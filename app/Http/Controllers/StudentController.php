<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Group;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $sortBy = $request->input('SortBy', 'default'); ;
        $students = Student::with('group');

        match ($sortBy) {
            'name' => $students->orderBy('last_name', 'asc'),
            'birth_date' => $students->orderBy('birth_date', 'asc'),
            default => $students->orderBy('id', 'asc'),
        };
        $group = Group::all();

        return view('students.index', ['students' => $students->paginate(10), 'group_data' => $group, 'sortBy' => $sortBy]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $group = Group::all();

        return view('students.create', ['data' => $group]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $group = Group::all();
        $formFields = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'birth_date' => 'required',
            'group_id' => 'required',
            'password' => ['required', 'confirmed'],

        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            if (!$imagePath) {
                return redirect()->back()->with('error', 'Failed to upload image.');
            }
            $formFields ['image'] = $request->file('image')->store('images', 'public');
        }


        $formFields['password'] = bcrypt($formFields['password']);

        $user = Student::create($formFields);

        auth()->login($user);

        return redirect()->route('profile', ['student' => auth()->user(), 'data' => $group])->with('success', 'User has been created');
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

        return view('students.show', ['data' => $subject, 'student' => $student, 'groups' => $groups, 'marks' => $mark, 'average' => $average]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {

        $group = Group::all();

        return view('students.edit', ['student' => $student, 'data' => $group]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->birth_date = $request->input('birth_date');
        $student->group_id = $request->input('group_id');
        if ($request->hasFile('image')) {
            if ($student->image) {
                Storage::disk('public')->delete($student->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $student->image = $imagePath;
        }
        $student->save();

        return redirect('students')->with('success', 'Student details updated correctly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect('students')->with('error', "Student {$student->first_name} {$student->last_name}  has been deleted");
    }

    public function view_profile(Student $student)
    {

        $group = Group::all();
        return view('students.profile', ['student' => $student, 'data' => $group]);
    }
}
