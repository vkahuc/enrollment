<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Program;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class OfferController extends Controller
{

    public function index()
    {
        $offers = Offer::with(['subject', 'program'])->get();
        return view('offer.index', compact('offers'));
    }

    public function create()
    {
        $subjects = Subject::all();
        $programs = Program::all();
        if ($programs->isEmpty() || $subjects->isEmpty()) {
            return redirect()->back()->with('error', 'Cannot add an offer as there are no programs or subjects created.');
        }
        return view('offer.add', compact('subjects', 'programs'));
    }

    public function store(Request $request)
    {
        Offer::create($request->all());
        return redirect()->route('offer.index');
    }

    public function assignTeacher($offer_id)
    {
        $offer = Offer::findOrFail($offer_id);
        $teachers = Teacher::where('program_id', $offer->program_id)->get();

        if ($teachers->isEmpty()) {
            return redirect()->back()->with('error', 'No teachers available for that program.');
        }

        return view('offer.assign_teacher', compact('offer', 'teachers'));
    }


    public function storeTeacherAssignment(Request $request)
    {
        $offer = Offer::findOrFail($request->input('offer_id'));
        $offer->teacher_id = $request->input('teacher_id');
        $offer->save();
        return redirect()->route('offer.index')->with('success', 'Teacher assigned successfully.');
    }

    public function edit($id)
    {
        $offer = Offer::findOrFail($id);
        $subjects = Subject::all();
        $programs = Program::all();
        return view('offer.edit', compact('offer', 'subjects', 'programs'));
    }

    public function update(Request $request, $id)
    {
        $offer = Offer::findOrFail($id);
        $previousProgramId = $offer->program_id;

        $validatedData = $request->validate([
            'section' => 'nullable',
            'schedule' => 'nullable',
            'room' => 'nullable',
            'capacity' => 'required|numeric',
            'program_id' => 'required',
            'year_level' => 'required',
        ]);

        $offer->update($validatedData);

        if ($previousProgramId != $validatedData['program_id']) {
            $offer->teacher_id = null;
            $offer->save();
        }

        return redirect()->route('offer.index')->with('success', 'Offer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);
        $offer->delete();

        return redirect()->route('offer.index')->with('success', 'Offer deleted successfully.');
    }
}
