<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('user')) {
            return Inertia::render('User/Dashboard/Dashboard');
        } elseif (Auth::user()->hasRole('administrator')) {
            return Inertia::render('Administrator/Dashboard/Dashboard');
        };
    }
}
