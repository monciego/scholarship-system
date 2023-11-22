<?php

namespace App\Http\Controllers;

use App\Models\PrivateScholarshipApplicants;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PrivateScholarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Representative/PrivateScholars/PrivateScholars', [
            'scholars' => PrivateScholarshipApplicants::withWhereHas('scholarship', function ($query) {
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
    public function show(string $id)
    {
        $scholar = PrivateScholarshipApplicants::with('scholarship')->findOrFail($id);

        return Inertia::render('Representative/PrivateScholars/PrivateScholarsInformation', compact('scholar'));
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
