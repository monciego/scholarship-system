<?php

namespace App\Http\Controllers;

use App\Models\AcademicScholarRequirements;
use App\Models\ApplicationForm;
use App\Models\PrivateScholarshipApplicants;
use App\Models\Scholarship;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function scholarships() {
        return Inertia::render('Administrator/Scholarships/Scholarships', [
            "scholarships" => Scholarship::with('representative')->latest()->get()
        ]);
    }

    public function scholarshipShow(Scholarship $scholarship)
    {
        return Inertia::render('Administrator/Scholarships/ScholarshipInformation', [
            'scholarship' => $scholarship
        ]);
    }
    public function scholars() {
        $governmentApplicant = ApplicationForm::with('scholarship')->get();
        $privateApplicant = PrivateScholarshipApplicants::with('scholarship')->where('approve', 1)->get();
        $academicApplicant = AcademicScholarRequirements::with('scholarship')->where('approve', 1)->get();

        $scholars = $governmentApplicant->merge($privateApplicant)->merge($academicApplicant);

        return Inertia::render('Administrator/Scholars/Scholars', compact('scholars'));
    }

    public function scholarShow($id)
    {
        // Search for the applied scholarship in the merged collection
        $scholar = $this->getScholarById($id);

        // Check if the scholarship is found
        if ($scholar) {
            // Pass the decoded requirements to the view
            $decodedRequirements = $scholar instanceof AcademicScholarRequirements
                ? $scholar->requirements
                : null;

            return Inertia::render('Administrator/Scholars/ScholarsInformation',
                compact('scholar','decodedRequirements' )
        );
        } else {
            // Applied scholarship not found, return a 404 response
            abort(404);
        }
    }

    private function getScholarById($id)
    {
        // Search for the applied scholarship in the merged collection
        $allScholars = $this->getallScholars();

        try {
            // Find the applied scholarship by ID
            $scholar = $allScholars->firstWhere('id', $id);

            // Check if the scholarship is an academic scholarship
            if ($scholar instanceof AcademicScholarRequirements) {
                // Retrieve the academic scholar's requirements and decode the JSON
                $files = json_decode($scholar->requirements, true);
                $scholar->requirements = $files; // Replace the original requirements with the decoded array
            }

            return $scholar;
        } catch (ModelNotFoundException $exception) {
            // Handle the case where the scholarship is not found
            return null;
        }
    }


    private function getallScholars()
    {
        // Retrieve all applied scholarships from different tables
        $governmentApplicant = ApplicationForm::with('scholarship')->where('approve', 1)->get();
        $privateApplicant = PrivateScholarshipApplicants::with('scholarship')->where('approve', 1)->get();
        $academicApplicant = AcademicScholarRequirements::with('scholarship')->where('approve', 1)->get();

        // Merge the collections
        return $governmentApplicant->merge($privateApplicant)->merge($academicApplicant);
    }



    public function applicants() {

    }
    public function rejectedApplicants() {

    }
    public function representatives() {

    }
    public function registeredUsers() {

    }


}
