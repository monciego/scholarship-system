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
use Phpml\CrossValidation\RandomSplit;
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


            $monthly_income = User::where('id', auth()->user()->id)->value('monthly_income');
            $annual_income = $monthly_income * 12;

            $number_of_studying_siblings = User::where('id', auth()->user()->id)->value('number_of_studying_siblings');

            $prediction = $classifier->predict([$annual_income, $number_of_studying_siblings]);


            if($prediction === 'Government') {
                $scholarshipRecommendations = Scholarship::with('representative')
                ->where('scholarshipType', "government scholarship")
                ->where('status', '!=', 'notAvailable')
                ->latest()
                ->get();
            } else {
                $scholarshipRecommendations = Scholarship::with('representative')
                ->where('scholarshipType', 'private scholarship')
                ->where('status', '!=', 'notAvailable')
                ->latest()
                ->get();

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
            // rejected applicants count
            $rejectedGovernmentScholar = ApplicationForm::with('scholarship')->where('approve', 0)->where('reject', 1)->get();
            $rejectedPrivateScholar = PrivateScholarshipApplicants::with('scholarship')->where('approve', 0)->where('reject', 1)->get();
            $rejectedAcademicScholar = AcademicScholarRequirements::with('scholarship')->where('approve', 0)->where('reject', 1)->get();
            $rejectScholarsCount = $rejectedGovernmentScholar->merge($rejectedPrivateScholar)->merge($rejectedAcademicScholar)->count();
            // representative count
            $representativeCount = User::whereHasRole('representative')->count();
            // registered user count
            $registeredUsersCount = User::whereHasRole('user')->count();
            return Inertia::render('Administrator/Dashboard/Dashboard', compact('scholarshipCount', 'registeredUsersCount', 'representativeCount', 'scholarsCount', 'applicantsCount','rejectScholarsCount'));
        } elseif ($user->hasRole('representative')) {
            return Inertia::render('Representative/Dashboard/Dashboard');
        };
    }
}



/* Accuracy */

/***
$csvFilePath = __DIR__ . '/dataset.csv';
$csv = Reader::createFromPath($csvFilePath, 'r');
$data = $csv->getRecords();
$csv->setHeaderOffset(0);
$headers = $csv->getHeader(); // Get header names if needed

$data = iterator_to_array($data);

$samples = [];
$labels = [];

foreach ($data as $row) {
    // Ensure that the following line corresponds to the structure of your CSV
    $samples[] = array_slice($row, 0, -1);
    $labels[] = end($row);
}

// Convert arrays to Dataset objects
$dataset = new ArrayDataset($samples, $labels);

$iterations = 1; // Since we are specifically interested in k=1

for ($i = 0; $i < $iterations; $i++) {
    // Split the dataset into training and testing sets
    $split = new RandomSplit($dataset, .99); // Adjust the second parameter for the desired split ratio
    $trainingSamples = $split->getTrainSamples();
    $testingSamples = $split->getTestSamples();
    $trainingLabels = $split->getTrainLabels();
    $testingLabels = $split->getTestLabels();

    // Train the classifier on the training set
    $classification = new KNearestNeighbors(4); // Set k=1
    $classification->train($trainingSamples, $trainingLabels);

    // Predict labels for the testing set
    $predictions = $classification->predict($testingSamples);

    // Count the number of correct predictions for k=1
    $correctPredictions = array_intersect_assoc($predictions, $testingLabels);
    $numCorrectPredictions = count($correctPredictions);

    $totalInstances = count($testingLabels);
    $accuracy = ( $numCorrectPredictions / $totalInstances) * 100;

    dd("Accuracy for k=1: " . $accuracy . '%, Correct Predictions: ' . $numCorrectPredictions . ', Total Instances: ' . $totalInstances);
}
*/
