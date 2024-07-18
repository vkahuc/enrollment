<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();

        return view('teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::all();

        if ($programs->isEmpty()) {
            return redirect()->back()->with('error', 'Cannot add a teacher as there are no existing programs.');
        }

        return view('teacher.add', compact('programs'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'sex' => 'required',
            'birthday' => 'required|date',
            'program_id' => 'required',
        ]);


        Teacher::create($validatedData);

        return redirect()->route('teacher.index')->with('success', 'Teacher created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $programs = Program::all();
        $teacher = Teacher::find($id);

        if (!$teacher) {
            return redirect()->route('teacher.index')->with('error', 'Teacher not found');

        }

        return view('teacher.edit', compact('teacher', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);

        if (!$teacher) {
            return redirect()->route('teacher.index')->with('error', 'Teacher not found');
        }

        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'sex' => 'required',
            'birthday' => 'required|date',
            'program_id' => 'required',
        ]);

        $teacher->update($validatedData);

        return redirect()->route('teacher.index')->with('success', 'Teacher updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teacher.index')->with('success', 'Teacher deleted successfully.');
    }
}
