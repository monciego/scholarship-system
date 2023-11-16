<?php

use App\Http\Controllers\AcademicScholarRequirementsController;
use App\Http\Controllers\AcademicScholarsController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ApplicationFormController;
use App\Http\Controllers\AppliedScholarships;
use App\Http\Controllers\AppliedScholarshipsController;
use App\Http\Controllers\Auth\RegisteredRepresentativeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RejectApplicantsController;
use App\Http\Controllers\ScholarController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\SchoolYearController;
use App\Models\AcademicScholarRequirements;
use App\Models\Scholarship;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $now = date("Y-m-d");

    return Inertia::render('Homepage/Homepage', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'scholarships' => Scholarship::where('deadlineAt', '>=', $now)->where('status', '=', 'available')->orWhere('status','onHold')->with('representative', 'applicationForm')->latest()->get()
    ]);
})->name('homepage.index');


Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['middleware' => ['auth', 'role:administrator', 'verified']], function() {
    Route::get('register-representative-account', [RegisteredRepresentativeController::class, 'create'])
    ->name('register.representative');
    Route::post('register-representative-account', [RegisteredRepresentativeController::class, 'store']);
    Route::resource('school-year', SchoolYearController::class);
});

Route::group(['middleware' => ['auth', 'role:representative', 'verified']], function() {
    Route::resource('scholarship', ScholarshipController::class);
    Route::resource('applicants', ApplicantController::class)->only('index', 'show');
    Route::resource('rejected-applicants', RejectApplicantsController::class)->only('index', 'show');
    Route::resource('scholars', ScholarController::class)->only('index', 'show');
    Route::resource('academic-scholars', AcademicScholarsController::class)->only('index', 'show');
    Route::post('/approve-applicant', [ApplicantController::class, 'approve'])->name('approve-applicant');
    Route::post('/reject-applicant', [ApplicantController::class, 'reject'])->name('reject-applicant');
    Route::post('/restore-applicant', [ApplicantController::class, 'restore'])->name('restore-applicant');
});

Route::group(['middleware' => ['auth', 'role:user', 'verified']], function() {
    Route::get('application-form/{scholarship}', [ApplicationFormController::class, 'index'])
    ->name('application-form');
    Route::resource('/application', ApplicationFormController::class);
    Route::get('pass-requirements-form/{scholarship}', [AcademicScholarRequirementsController::class, 'index'])->name('pass-requirements.index');
    Route::resource('pass-requirements', AcademicScholarRequirementsController::class)->only('store');
    Route::resource('applied-scholarships', AppliedScholarshipsController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
