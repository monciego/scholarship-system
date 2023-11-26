<?php

namespace App\Http\Controllers;

use App\Models\PrivateScholarshipApplicants;
use Illuminate\Http\Request;

class PrivateScholarshipApplicantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'scholarship_id' => 'required',
            'student_id' => 'required',
            'degree' => 'required',
            'email' => 'required',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
        ]);


        PrivateScholarshipApplicants::create($validated);
        $applicationLink = $request->applicationLink;
        return redirect()->back()->with('successModalPrivate', $applicationLink);

    }

    /**
     * Display the specified resource.
     */
    public function show(PrivateScholarshipApplicants $privateScholarshipApplicants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrivateScholarshipApplicants $privateScholarshipApplicants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PrivateScholarshipApplicants $privateScholarshipApplicants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrivateScholarshipApplicants $privateScholarshipApplicants)
    {
        //
    }
}
