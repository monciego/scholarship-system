<?php

namespace App\Http\Controllers;

use App\Models\ApplicationForm;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Closure;

class ApplicationFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Scholarship $scholarship)
    {
        return Inertia::render('User/ApplicationForm/ApplicationForm', [
            'scholarship' => $scholarship
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
        $validated = $request->validate([
            'user_id' => 'required',
            'scholarship_id' => 'required',
            'student_id' => ['required', 'string', 'max:255',
            function (string $attribute, mixed $value, Closure $fail) {
                $student_id = request()->input('student_id');
                $id_exists = ApplicationForm::where('student_id', $student_id)->where('scholarship_id', request()->input('scholarship_id'))->count() > 0;
                if ($id_exists) {
                    $fail("Student ID already linked to this scholarship.");
                }
            },
        ],
            'degree' => 'required|string|max:255',
            'campus' => 'required|string|max:255',
            'average' => 'nullable',
            'admission_test_score' => 'nullable',
            'email' => 'required|string|email|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
        ]);

        ApplicationForm::create($validated);

        return redirect()->back()->with('successModal', 'Application Submitted!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ApplicationForm $applicationForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ApplicationForm $applicationForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ApplicationForm $applicationForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApplicationForm $applicationForm)
    {
        //
    }
}
