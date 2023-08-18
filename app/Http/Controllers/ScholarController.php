<?php

namespace App\Http\Controllers;

use App\Models\ApplicationForm;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ScholarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Representative/Scholars/Scholars', [
            'applicants' => ApplicationForm::where('approve', 1)->withWhereHas('scholarship', function ($query) {
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
    public function show(ApplicationForm $scholar)
    {
        $scholar = ApplicationForm::with('scholarship')->where('approve', 1)->findOrFail($scholar->id);
        return Inertia::render('Representative/Scholars/ScholarInformation', compact('scholar'));
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
