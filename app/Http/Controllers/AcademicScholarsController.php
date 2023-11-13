<?php

namespace App\Http\Controllers;

use App\Models\AcademicScholarRequirements;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AcademicScholarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Representative/AcademicScholars/AcademicScholars', [
            'scholars' => AcademicScholarRequirements::withWhereHas('scholarship', function ($query) {
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
    public function show($id)
    {
        $scholar = AcademicScholarRequirements::with('scholarship')->findOrFail($id);
        $files = json_decode($scholar->requirements, true);

        return Inertia::render('Representative/AcademicScholars/AcademicScholarsInformation', compact('scholar', 'files'));
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
