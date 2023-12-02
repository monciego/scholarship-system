<?php

use App\Http\Controllers\AcademicScholarRequirementsController;
use App\Http\Controllers\AcademicScholarsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ApplicationFormController;
use App\Http\Controllers\AppliedScholarships;
use App\Http\Controllers\AppliedScholarshipsController;
use App\Http\Controllers\Auth\RegisteredRepresentativeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PrivateScholarsController;
use App\Http\Controllers\PrivateScholarshipApplicantsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RejectApplicantsController;
use App\Http\Controllers\ScholarController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\SchoolYearController;
use App\Models\AcademicScholarRequirements;
use App\Models\Announcement;
use App\Models\PrivateScholarshipApplicants;
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
        'scholarships' => Scholarship::where('deadlineAt', '>=', $now)->where('status', '=', 'available')->orWhere('status','onHold')->with('representative', 'applicationForm')->latest()->get(),
        'announcements' => Announcement::latest()->get()
    ]);
})->name('homepage.index');

Route::get('/announcements/{announcement}', [AnnouncementController::class, 'showAnnouncement'])->name('showAnnouncement');

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['middleware' => ['auth', 'role:administrator|representative']], function () {
    Route::resource('announcement', AnnouncementController::class);
});


Route::group(['middleware' => ['auth', 'role:administrator', 'verified']], function() {
    Route::get('register-representative-account', [RegisteredRepresentativeController::class, 'create'])
    ->name('register.representative');
    Route::post('register-representative-account', [RegisteredRepresentativeController::class, 'store']);
    Route::resource('school-year', SchoolYearController::class);
    Route::get('total-of-scholarships', [AdminController::class, 'scholarships'])->name('total-of-scholarships');
    Route::get('total-of-scholarships/{scholarship}', [AdminController::class, 'scholarshipShow'])->name('total-of-scholarships.show');
    Route::get('total-of-scholars', [AdminController::class, 'scholars'])->name('total-of-scholars');
    Route::get('total-of-scholars/{id}', [AdminController::class, 'scholarShow'])->name('total-of-scholars.show');
    Route::get('total-of-applicants', [AdminController::class, 'applicants'])->name('total-of-applicants');
    Route::get('total-of-applicants/{id}', [AdminController::class, 'applicantsShow'])->name('total-of-applicants.show');
    Route::get('total-of-rejected-applicants', [AdminController::class, 'rejectedApplicants'])->name('total-of-rejected-applicants');
    Route::get('total-of-rejected-applicants/{id}', [AdminController::class, 'rejectedApplicantsShow'])->name('total-of-rejected-applicants.show');
    Route::get('total-of-representatives', [AdminController::class, 'representatives'])->name('total-representatives');
    Route::get('total-of-registered-users', [AdminController::class, 'registeredUsers'])->name('registeredUsers');
});

Route::group(['middleware' => ['auth', 'role:representative', 'verified']], function() {
    Route::resource('scholarship', ScholarshipController::class);
    Route::resource('applicants', ApplicantController::class)->only('index', 'show');
    Route::resource('rejected-applicants', RejectApplicantsController::class)->only('index', 'show');
    Route::resource('scholars', ScholarController::class)->only('index', 'show');
    Route::resource('academic-scholars', AcademicScholarsController::class)->only('index', 'show');
    Route::resource('private-scholars', PrivateScholarsController::class);
    Route::post('/approve-applicant', [ApplicantController::class, 'approve'])->name('approve-applicant');
    Route::post('/reject-applicant', [ApplicantController::class, 'reject'])->name('reject-applicant');
    Route::post('/restore-applicant', [ApplicantController::class, 'restore'])->name('restore-applicant');
    // academic scholarship
    Route::post('/approve-academic', [AcademicScholarsController::class, 'approve'])->name('approve-academic');
    Route::post('/reject-academic', [AcademicScholarsController::class, 'reject'])->name('reject-academic');
    // private scholarship
    Route::post('/approve-private', [PrivateScholarsController::class, 'approve'])->name('approve-private');
    Route::post('/reject-private', [PrivateScholarsController::class, 'reject'])->name('reject-private');
});

Route::group(['middleware' => ['auth', 'role:user', 'verified']], function() {
    Route::get('application-form/{scholarship}', [ApplicationFormController::class, 'index'])
    ->name('application-form');
    Route::resource('/application', ApplicationFormController::class);
    Route::get('pass-requirements-form/{scholarship}', [AcademicScholarRequirementsController::class, 'index'])->name('pass-requirements.index');
    Route::resource('pass-requirements', AcademicScholarRequirementsController::class)->only('store');
    Route::resource('applied-scholarships', AppliedScholarshipsController::class);
    Route::resource('private-scholarship-form', PrivateScholarshipApplicantsController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
