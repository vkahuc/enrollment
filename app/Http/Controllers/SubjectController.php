<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subjects = Subject::all();

        return view('subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('subject.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'code' => 'required|string|max:10|unique:subjects,code,' . ($request->route('id') ?? 'NULL') . ',id',
            'name' => 'required|string',
            'description' => 'required|string',
            'credits' => 'required|string',
        ]);


        Subject::create($validatedData);
        $subjects = Subject::all() ?? [];

        return view('subject.index', compact('subjects'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $subject = Subject::find($id);

        if (!$subject) {
            return redirect()->route('subject.index')->with('error', 'Subject not found');

        }

        return view('subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'code' => 'required|string|max:10|unique:subjects,code,' . ($request->route('id') ?? 'NULL') . ',id',
            'name' => 'required|string',
            'description' => 'required|string',
            'credits' => 'required|string',
        ]);

        $subject = Subject::find($id);

        if (!$subject) {
            return redirect()->route('subject.index')->with('error', 'Subject not found');
        }

        $subject->code = $validatedData['code'];
        $subject->name = $validatedData['name'];
        $subject->description = $validatedData['description'];
        $subject->credits = $validatedData['credits'];
        $subject->save();

        return redirect()->route('subject.index')->with('success', 'Subject updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('subject.index')->with('success', 'Subject deleted successfully.');
    }
}
