<?php

namespace App\Http\Controllers;

use App\Models\ApplicationForm;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Representative/Applicants/Applicants', [
            'applicants' => ApplicationForm::where('approve', 0)->withWhereHas('scholarship', function ($query) {
                return $query->where('user_id', auth()->user()->id);
            })->latest()->get()
        ]);
    }


    /**
     * Approve application
     */

    public function approve(Request $request)
    {
        ApplicationForm::where('id', $request->id)->update([
            'approve' => 1,
        ]);

        return redirect(route('applicants.index'))->with('success', 'Application approved!');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ApplicationForm $applicant)
    {
        $applicant = ApplicationForm::with('scholarship')->findOrFail($applicant->id);
        return Inertia::render('Representative/Applicants/ApplicantInformation', compact('applicant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
