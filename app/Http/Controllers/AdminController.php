<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
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
