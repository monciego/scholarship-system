<?php

namespace App\Http\Controllers;

use App\Events\ScholarshipPublished;
use App\Models\Scholarship;
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
        return Inertia::render('Representative/Scholarships/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'scholarshipName' => 'required|string|max:255',
            'deadlineAt' => 'required|date|max:255',
            'availableFor' => 'required|string|max:255',
            'status' => 'required',
            'slot' => 'nullable',
            'applicationLink' => 'nullable|string|max:255',
            'details' => 'nullable|string|max:255',
        ]);

      $scholarship =  $request->user()->scholarships()->create($validated);

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
            'scholarship' => $scholarship
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Scholarship $scholarship)
    {
        $validated = $request->validate([
            'scholarshipName' => 'required|string|max:255',
            'deadlineAt' => 'required|date|max:255',
            'availableFor' => 'required|string|max:255',
            'status' => 'required',
            'slot' => 'nullable',
            'applicationLink' => 'nullable|string|max:255',
            'details' => 'nullable|string|max:255',
        ]);

        $scholarship->update($validated);

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
