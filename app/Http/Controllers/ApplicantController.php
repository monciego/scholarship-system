<?php

namespace App\Http\Controllers;

use App\Mail\ApprovedApplicantEmail;
use App\Mail\RejectedApplicantEmail;
use App\Mail\RestoredApplicantEmail;
use App\Models\ApplicationForm;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Mail;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Representative/Applicants/Applicants', [
            'applicants' => ApplicationForm::where('approve', 0)->where('reject', 0)->withWhereHas('scholarship', function ($query) {
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
            'remarks' => $request->remarks,
        ]);

        $data = [
            'scholarshipName' => $request->scholarshipName,
            'email' => $request->email,
            'name' => $request->name,
            'representativeName' => Auth::user()->name,
            'representativeEmail' => Auth::user()->email,
        ];

        Mail::to($data['email'])->send(new ApprovedApplicantEmail($data));

        return redirect(route('applicants.index'))->with('success', 'Application approved!');
    }

    /**
     * Reject application
     */

    public function reject(Request $request)
    {
        ApplicationForm::where('id', $request->id)->update([
            'reject' => 1,
            'remarks' => $request->remarks,
        ]);

        $data = [
            'scholarshipName' => $request->scholarshipName,
            'email' => $request->email,
            'name' => $request->name,
            'representativeEmail' => Auth::user()->email,
        ];

        Mail::to($data['email'])->send(new RejectedApplicantEmail($data));

        return redirect(route('applicants.index'))->with('success', 'Application Rejected!');
    }

    /**
     * Restore application
     */

    public function restore(Request $request)
    {
        ApplicationForm::where('id', $request->id)->update([
            'reject' => 0,
        ]);

        $data = [
            'scholarshipName' => $request->scholarshipName,
            'email' => $request->email,
            'name' => $request->name,
            'representativeEmail' => Auth::user()->email,
        ];

        Mail::to($data['email'])->send(new RestoredApplicantEmail($data));

        return redirect(route('rejected-applicants.index'))->with('success', 'Application Restored!');
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
