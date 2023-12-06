<?php

namespace App\Http\Controllers;

use App\Models\AcademicScholarRequirements;
use App\Models\ApplicationForm;
use App\Models\PrivateScholarshipApplicants;
use App\Models\Scholarship;
use App\Models\SchoolYear;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function scholarships() {
        return Inertia::render('Administrator/Scholarships/Scholarships', [
            "scholarships" => Scholarship::with('representative')->latest()->get(),
            "schoolYears" => SchoolYear::all()
        ]);
    }

    public function scholarshipShow(Scholarship $scholarship)
    {
        return Inertia::render('Administrator/Scholarships/ScholarshipInformation', [
            'scholarship' => $scholarship
        ]);
    }
    public function scholars() {
        $governmentApplicant = ApplicationForm::with('scholarship')->where('approve', 1)->get();
        $privateApplicant = PrivateScholarshipApplicants::with('scholarship')->where('approve', 1)->get();
        $academicApplicant = AcademicScholarRequirements::with('scholarship')->where('approve', 1)->get();

        $scholars = $governmentApplicant->merge($privateApplicant)->merge($academicApplicant);

        $schoolYears = SchoolYear::all();

        return Inertia::render('Administrator/Scholars/Scholars', compact('scholars', 'schoolYears'));
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


    /* Applicants */

    public function applicants() {
        $governmentApplicant = ApplicationForm::with('scholarship')->where('approve', 0)->where('reject', 0)->get();
        $privateApplicant = PrivateScholarshipApplicants::with('scholarship')->where('approve', 0)->where('reject', 0)->get();
        $academicApplicant = AcademicScholarRequirements::with('scholarship')->where('approve', 0)->where('reject', 0)->get();

        $applicants = $governmentApplicant->merge($privateApplicant)->merge($academicApplicant);

        $schoolYears = SchoolYear::all();

        return Inertia::render('Administrator/Applicants/Applicants', compact('applicants', 'schoolYears'));
    }


    public function applicantsShow($id)
    {
        // Search for the applied scholarship in the merged collection
        $applicant = $this->getApplicantsById($id);

        // Check if the scholarship is found
        if ($applicant) {
            // Pass the decoded requirements to the view
            $decodedRequirements = $applicant instanceof AcademicScholarRequirements
                ? $applicant->requirements
                : null;

            return Inertia::render('Administrator/Applicants/ApplicantInformation',
                compact('applicant','decodedRequirements' )
        );
        } else {
            // Applied scholarship not found, return a 404 response
            abort(404);
        }
    }


    private function getApplicantsById($id)
    {
        // Search for the applied scholarship in the merged collection
        $allApplicants = $this->getALlApplicants();

        try {
            // Find the applied scholarship by ID
            $applicant = $allApplicants->firstWhere('id', $id);

            // Check if the scholarship is an academic scholarship
            if ($applicant instanceof AcademicScholarRequirements) {
                // Retrieve the academic scholar's requirements and decode the JSON
                $files = json_decode($applicant->requirements, true);
                $applicant->requirements = $files; // Replace the original requirements with the decoded array
            }

            return $applicant;
        } catch (ModelNotFoundException $exception) {
            // Handle the case where the scholarship is not found
            return null;
        }
    }

    private function getALlApplicants()
    {
        // Retrieve all applied scholarships from different tables
        $governmentApplicant = ApplicationForm::with('scholarship')->where('approve', 0)->where('reject', 0)->get();
        $privateApplicant = PrivateScholarshipApplicants::with('scholarship')->where('approve', 0)->where('reject', 0)->get();
        $academicApplicant = AcademicScholarRequirements::with('scholarship')->where('approve', 0)->where('reject', 0)->get();

        // Merge the collections
        return $governmentApplicant->merge($privateApplicant)->merge($academicApplicant);
    }

    /* Rejected Applicants */
    public function rejectedApplicants() {
        $governmentApplicant = ApplicationForm::with('scholarship')->where('approve', 0)->where('reject', 1)->get();
        $privateApplicant = PrivateScholarshipApplicants::with('scholarship')->where('approve', 0)->where('reject', 1)->get();
        $academicApplicant = AcademicScholarRequirements::with('scholarship')->where('approve', 0)->where('reject', 1)->get();

        $rejectedApplicants = $governmentApplicant->merge($privateApplicant)->merge($academicApplicant);

        $schoolYears = SchoolYear::all();

        return Inertia::render('Administrator/Rejected-Applicants/RejectedApplicants', compact('rejectedApplicants', 'schoolYears'));
    }

    public function rejectedApplicantsShow($id)
    {
        // Search for the applied scholarship in the merged collection
        $rejectedApplicant = $this->getRejectedApplicantsById($id);

        // Check if the scholarship is found
        if ($rejectedApplicant) {
            // Pass the decoded requirements to the view
            $decodedRequirements = $rejectedApplicant instanceof AcademicScholarRequirements
                ? $rejectedApplicant->requirements
                : null;

            return Inertia::render('Administrator/Rejected-Applicants/RejectedApplicantInformation',
                compact('rejectedApplicant','decodedRequirements' )
        );
        } else {
            // Applied scholarship not found, return a 404 response
            abort(404);
        }
    }


    private function getRejectedApplicantsById($id)
    {
        // Search for the applied scholarship in the merged collection
        $allApplicants = $this->getALlRejectedApplicants();

        try {
            // Find the applied scholarship by ID
            $rejectedApplicant = $allApplicants->firstWhere('id', $id);

            // Check if the scholarship is an academic scholarship
            if ($rejectedApplicant instanceof AcademicScholarRequirements) {
                // Retrieve the academic scholar's requirements and decode the JSON
                $files = json_decode($rejectedApplicant->requirements, true);
                $rejectedApplicant->requirements = $files; // Replace the original requirements with the decoded array
            }

            return $rejectedApplicant;
        } catch (ModelNotFoundException $exception) {
            // Handle the case where the scholarship is not found
            return null;
        }
    }

    private function getALlRejectedApplicants()
    {
        // Retrieve all applied scholarships from different tables
        $governmentApplicant = ApplicationForm::with('scholarship')->where('approve', 0)->where('reject', 1)->get();
        $privateApplicant = PrivateScholarshipApplicants::with('scholarship')->where('approve', 0)->where('reject', 1)->get();
        $academicApplicant = AcademicScholarRequirements::with('scholarship')->where('approve', 0)->where('reject', 1)->get();

        // Merge the collections
        return $governmentApplicant->merge($privateApplicant)->merge($academicApplicant);
    }

    // Representatives
    public function representatives() {
        return Inertia::render('Administrator/Representatives/Representatives', [
            'representatives' => User::with('scholarships')->whereHasRole('representative')->latest()->get()
        ]);
    }

    // Registered Users
    public function registeredUsers() {
        return Inertia::render('Administrator/RegisteredUsers/RegisteredUsers', [
            'registeredUsers' => User::with('scholarships')->whereHasRole('user')->latest()->get()
        ]);
    }
}
