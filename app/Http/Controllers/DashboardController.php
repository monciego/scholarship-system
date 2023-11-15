<?php

namespace App\Http\Controllers;

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
            return Inertia::render('Administrator/Dashboard/Dashboard', compact('scholarshipCount'));
        } elseif ($user->hasRole('representative')) {
            return Inertia::render('Representative/Dashboard/Dashboard');
        };
    }
}
