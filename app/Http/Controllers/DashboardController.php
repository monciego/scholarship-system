<?php

namespace App\Http\Controllers;

use App\Models\AcademicScholarRequirements;
use App\Models\Announcement;
use App\Models\ApplicationForm;
use App\Models\PrivateScholarshipApplicants;
use App\Models\Scholarship;
use App\Models\User;
use League\Csv\Reader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Phpml\Classification\KNearestNeighbors;
use Phpml\Dataset\ArrayDataset;
use Phpml\FeatureExtraction\TfIdfTransformer;
use Phpml\FeatureExtraction\TfIdfVectorizer;
use Phpml\Metric\Accuracy;

class DashboardController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User */
        $user = Auth::user();
        if ($user->hasRole('user')) {
            $userData = User::where('id', auth()->user()->id)->firstOrFail();
            $existing_scholarships = json_decode($userData->have_existing_scholarship, true);
            $announcements = Announcement::with('user')->latest()->get();

            // Get the absolute path to the CSV file
            $csvFilePath = __DIR__ . '/dataset.csv';
            $csv = Reader::createFromPath($csvFilePath, 'r');
            $data = $csv->getRecords();
            $csv->setHeaderOffset(0);
            $headers = $csv->getHeader(); // Get header names if needed

            $data = iterator_to_array($data);


            $classification = new KNearestNeighbors($k = 3);

            $samples = [];
            $labels = [];

            foreach ($data as $row) {
                // Ensure that the following line corresponds to the structure of your CSV
                $samples[] = array_slice($row, 0, -1);
                $labels[] = end($row);
            }

            $samples = array_map(fn($row) => array_slice($row, 0, -1), $data);
            $labels = array_column($data, count($data[0]) - 1);

            $classifier = new KNearestNeighbors();
            $classifier->train($samples, $labels);


            $house_hold_per_capita_income = User::where('id', auth()->user()->id)->value('house_hold_per_capita_income');
            $number_of_studying_siblings = User::where('id', auth()->user()->id)->value('number_of_studying_siblings');

            $prediction = $classifier->predict([$house_hold_per_capita_income, $number_of_studying_siblings]);

            if($prediction === 'Government') {
                $scholarshipRecommendations = Scholarship::with('representative')->where('scholarshipType', "government scholarship")->latest()->get();
            } else {
                $scholarshipRecommendations = Scholarship::with('representative')->where('scholarshipType', "private scholarship")->latest()->get();
            }

            return Inertia::render('User/Dashboard/Dashboard', compact('userData', 'scholarshipRecommendations', 'existing_scholarships', 'announcements'));
        } elseif ($user->hasRole('administrator')) {
            // scholarship count
            $scholarshipCount = Scholarship::count();
            // applicants count
            $governmentApplicant = ApplicationForm::with('scholarship')->where('approve', 0)->where('reject', 0)->get();
            $privateApplicant = PrivateScholarshipApplicants::with('scholarship')->where('approve', 0)->where('reject', 0)->get();
            $academicApplicant = AcademicScholarRequirements::with('scholarship')->where('approve', 0)->where('reject', 0)->get();
            $applicantsCount = $governmentApplicant->merge($privateApplicant)->merge($academicApplicant)->count();

            // scholars count
            $governmentScholar = ApplicationForm::with('scholarship')->where('approve', 1)->where('reject', 0)->get();
            $privateScholar = PrivateScholarshipApplicants::with('scholarship')->where('approve', 1)->where('reject', 0)->get();
            $academicScholar = AcademicScholarRequirements::with('scholarship')->where('approve', 1)->where('reject', 0)->get();
            $scholarsCount = $governmentScholar->merge($privateScholar)->merge($academicScholar)->count();

            $rejectScholarsCount = ApplicationForm::where('approve', 0)->where('reject', 1)->count();
            $representativeCount = User::whereHasRole('representative')->count();
            $registeredUsersCount = User::whereHasRole('user')->count();
            return Inertia::render('Administrator/Dashboard/Dashboard', compact('scholarshipCount', 'registeredUsersCount', 'representativeCount', 'scholarsCount', 'applicantsCount','rejectScholarsCount'));
        } elseif ($user->hasRole('representative')) {
            return Inertia::render('Representative/Dashboard/Dashboard');
        };
    }
}
