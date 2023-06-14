<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $group = new Group;
        return view('groups.index', ['data'=>$group->paginate(10)]);
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
        $group -> save();

        return redirect('/groups')->with('success', 'Group added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
     
        $student = Student::where('group_id', $group->id)->paginate(10);
        return view('groups.show', ['group_data'=>$group->name, 'data'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        return view('groups.edit', ['group'=>$group]);
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
        $group ->delete();

        return  redirect('/groups')->with('error', 'Group deleted successfully');
    }
}
