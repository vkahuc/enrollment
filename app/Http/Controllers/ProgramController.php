<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $programs = Program::all();

        return view('program.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('program.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'code' => 'required|string|max:10|unique:programs,code,' . ($request->route('id') ?? 'NULL') . ',id',
            'name' => 'required|string',
        ]);

        Program::create($validatedData);
        $programs = Program::all() ?? [];

        return view('program.index', compact('programs'));

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $program = Program::find($id);

        if (!$program) {
            return redirect()->route('program.index')->with('error', 'Program not found');

        }

        return view('program.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'code' => 'required|string|max:10|unique:programs,code,' . $id . ',id',
            'name' => 'required|string',
        ]);

        $program = Program::find($id);

        if (!$program) {
            return redirect()->route('program.index')->with('error', 'Program not found');
        }

        $program->code = $validatedData['code'];
        $program->name = $validatedData['name'];
        $program->save();

        return redirect()->route('program.index')->with('success', 'Program updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return redirect()->route('program.index')->with('success', 'Program deleted successfully.');
    }
}
