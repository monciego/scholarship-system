<?php

namespace App\Http\Controllers;

use App\Models\AcademicScholarRequirements;
use App\Models\ApplicationForm;
use App\Models\PrivateScholarshipApplicants;
use App\Models\Scholarship;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AppliedScholarshipsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $governmentApplicant = ApplicationForm::with('scholarship')->where('user_id', auth()->user()->id)->get();
        $privateApplicant = PrivateScholarshipApplicants::with('scholarship')->where('user_id', auth()->user()->id)->get();
        $academicApplicant = AcademicScholarRequirements::with('scholarship')->where('user_id', auth()->user()->id)->get();

        $applicants = $governmentApplicant->merge($privateApplicant)->merge($academicApplicant);
        // dd($applicants);
        return Inertia::render('User/AppliedScholarship/AppliedScholarsip', compact('applicants'));
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

    public function show($id)
    {
        // Search for the applied scholarship in the merged collection
        $appliedScholarship = $this->getAppliedScholarshipById($id);

        // Check if the scholarship is found
        if ($appliedScholarship) {
            // Pass the decoded requirements to the view
            $decodedRequirements = $appliedScholarship instanceof AcademicScholarRequirements
                ? $appliedScholarship->requirements
                : null;

            return Inertia::render('User/AppliedScholarship/AppliedScholarshipInformation',
                compact('appliedScholarship','decodedRequirements' )
        );
        } else {
            // Applied scholarship not found, return a 404 response
            abort(404);
        }
    }

    private function getAppliedScholarshipById($id)
    {
        // Search for the applied scholarship in the merged collection
        $allApplicants = $this->getAllApplicants();

        try {
            // Find the applied scholarship by ID
            $appliedScholarship = $allApplicants->firstWhere('id', $id);

            // Check if the scholarship is an academic scholarship
            if ($appliedScholarship instanceof AcademicScholarRequirements) {
                // Retrieve the academic scholar's requirements and decode the JSON
                $files = json_decode($appliedScholarship->requirements, true);
                $appliedScholarship->requirements = $files; // Replace the original requirements with the decoded array
            }

            return $appliedScholarship;
        } catch (ModelNotFoundException $exception) {
            // Handle the case where the scholarship is not found
            return null;
        }
    }

    private function getAllApplicants()
    {
        // Retrieve all applied scholarships from different tables
        $governmentApplicant = ApplicationForm::with('scholarship')->where('user_id', auth()->user()->id)->get();
        $privateApplicant = PrivateScholarshipApplicants::with('scholarship')->where('user_id', auth()->user()->id)->get();
        $academicApplicant = AcademicScholarRequirements::with('scholarship')->where('user_id', auth()->user()->id)->get();

        // Merge the collections
        return $governmentApplicant->merge($privateApplicant)->merge($academicApplicant);
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
