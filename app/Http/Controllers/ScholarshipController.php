<?php

namespace App\Http\Controllers;

use App\Events\ScholarshipPublished;
use App\Models\Scholarship;
use App\Models\SchoolYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;



class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Representative/Scholarships/Index', [
            'scholarships' => Scholarship::with('representative')->where('user_id', Auth::user()->id)->latest()->get()

            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $school_years = SchoolYear::get();
        return Inertia::render('Representative/Scholarships/Create', compact('school_years'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'school_year_id' => 'required',
            'scholarshipName' => 'required|string|max:255',
            'deadlineAt' => 'required|date|max:255',
            'availableFor' => 'required|string|max:255',
            'status' => 'required',
            'slot' => 'nullable',
            'applicationLink' => 'nullable|string|max:255',
            'details' => 'nullable',
            'scholarshipType' => 'nullable|string|max:255',
            'requirements' => 'nullable',
        ]);

        $requirements = $request->input('requirements');

        $scholarship =  $request->user()->scholarships()->create([
            'school_year_id' => $request->input('school_year_id'),
            'scholarshipName' => $request->input('scholarshipName'),
            'deadlineAt' => $request->input('deadlineAt'),
            'availableFor' => $request->input('availableFor'),
            'status' => $request->input('status'),
            'slot' => $request->input('slot'),
            'applicationLink' => $request->input('applicationLink'),
            'details' => $request->input('details'),
            'scholarshipType' => $request->input('scholarshipType'),
            'requirements' => implode('|',$requirements),
        ]);


        event(new ScholarshipPublished($scholarship));

        return redirect()->back()->with('success', 'Scholarship Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Scholarship $scholarship)
    {
        return Inertia::render('Representative/Scholarships/Show', [
            'scholarship' => $scholarship
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Scholarship $scholarship)
    {
        return Inertia::render('Representative/Scholarships/Edit', [
            'scholarship' => $scholarship,
            'school_years' =>  SchoolYear::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Scholarship $scholarship)
    {
        $validated = $request->validate([
            'scholarshipName' => 'required|string|max:255',
            'school_year_id' => 'required',
            'deadlineAt' => 'required|date|max:255',
            'availableFor' => 'required|string|max:255',
            'status' => 'required',
            'slot' => 'nullable',
            'applicationLink' => 'nullable|string|max:255',
            'scholarshipType' => 'nullable|string|max:255',
            'details' => 'nullable',
            'requirements' => 'nullable',
        ]);

        $requirements = $request->input('requirements');

        $scholarship->update([
            'school_year_id' => $request->input('school_year_id'),
            'scholarshipName' => $request->input('scholarshipName'),
            'deadlineAt' => $request->input('deadlineAt'),
            'availableFor' => $request->input('availableFor'),
            'status' => $request->input('status'),
            'slot' => $request->input('slot'),
            'applicationLink' => $request->input('applicationLink'),
            'details' => $request->input('details'),
            'scholarshipType' => $request->input('scholarshipType'),
            'requirements' => implode('|',$requirements),
        ]);

        return redirect(route('scholarship.index'))->with('success', 'Scholarship Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scholarship $scholarship)
    {
        $scholarship->delete();
        return redirect(route('scholarship.index'))->with('danger', 'Scholarship Deleted!');
    }
}
