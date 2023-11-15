<?php

namespace App\Http\Controllers;

use App\Models\ApplicationForm;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User */
        $user = Auth::user();
        if ($user->hasRole('user')) {
            return Inertia::render('User/Dashboard/Dashboard');
        } elseif ($user->hasRole('administrator')) {
            $scholarshipCount = Scholarship::count();
            $applicantsCount = ApplicationForm::where('approve', 0)->where('reject', 0)->count();
            $scholarsCount = ApplicationForm::where('approve', 1)->where('reject', 0)->count();
            $rejectScholarsCount = ApplicationForm::where('approve', 0)->where('reject', 1)->count();
            return Inertia::render('Administrator/Dashboard/Dashboard', compact('scholarshipCount', 'scholarsCount', 'applicantsCount','rejectScholarsCount'));
        } elseif ($user->hasRole('representative')) {
            return Inertia::render('Representative/Dashboard/Dashboard');
        };
    }
}
