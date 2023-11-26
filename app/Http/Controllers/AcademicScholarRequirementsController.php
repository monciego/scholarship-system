<?php

namespace App\Http\Controllers;

use App\Models\AcademicScholarRequirements;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AcademicScholarRequirementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Scholarship $scholarship)
    {
        if ($scholarship->requirements === "") {
            abort(403, "🌟 Attention: This scholarship doesn't fall under the academic category, and access to the form is restricted. Thank you for your understanding! 🚀");
        }
        return Inertia::render('User/ApplicationForm/PassRequirementsForm', [
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
        // dd($request->requirements);
        $validated = $request->validate([
            'user_id' => 'required',
            'scholarship_id' => 'required',
            'student_id' => ['required', 'string', 'max:255'],
            'degree' => 'required|string|max:255',
            'campus' => 'required|string|max:255',
            'average' => 'nullable',
            'admission_test_score' => 'nullable',
            'email' => 'required|string|email|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'requirements.*' => ['required'],
        ],[
            'requirements.*.required' => 'The requirements field is required for all files.',
        ]);



        $requirements = [];
        foreach ($request->file('requirements') as $index => $file) {
            foreach($file as $requirement) {
                $path = $requirement->store('requirements', 'public');
                $requirements[$index][] = $path;
            }
        }

        AcademicScholarRequirements::create([
            'user_id' => $request->input('user_id'),
            'scholarship_id' => $request->input('scholarship_id'),
            'student_id' => $request->input('student_id'),
            'degree' => $request->input('degree'),
            'campus' => $request->input('campus'),
            'average' => $request->input('average'),
            'admission_test_score' => $request->input('admission_test_score'),
            'email' => $request->input('email'),
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
            "requirements" => json_encode($requirements),
        ]);

        return redirect()->back()->with('passedRequirementModal', 'Application Submitted!');
    }

    /**
     * Display the specified resource.
     */
    public function show(AcademicScholarRequirements $academicScholarRequirements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademicScholarRequirements $academicScholarRequirements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AcademicScholarRequirements $academicScholarRequirements)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademicScholarRequirements $academicScholarRequirements)
    {
        //
    }
}
