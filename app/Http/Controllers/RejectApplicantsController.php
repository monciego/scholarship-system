<?php

namespace App\Http\Controllers;

use App\Models\ApplicationForm;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RejectApplicantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Representative/RejectedApplicants/RejectedApplicants', [
            'applicants' => ApplicationForm::where('reject', 1)->withWhereHas('scholarship', function ($query) {
                return $query->where('user_id', auth()->user()->id);
            })->latest()->get()
        ]);
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
    public function show(ApplicationForm $rejected_applicant)
    {
        $rejectedApplicant = ApplicationForm::with('scholarship')->where('reject', 1)->findOrFail($rejected_applicant->id);
        return Inertia::render('Representative/RejectedApplicants/RejectedApplicantInformation', compact('rejectedApplicant'));
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
