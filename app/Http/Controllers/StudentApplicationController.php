<?php

namespace App\Http\Controllers;

use App\Models\StudentApplication;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StudentApplicationController extends Controller {
    /**
     * Save an instance of StudentApplication
     * @param Request $request
     * @return JsonResponse
     */
    public function insertStudentApplication(Request $request): JsonResponse {
        $name = $request->name;
        $age = $request->age;
        $gender = $request->gender;
        $maritalStatus = $request->marital_status;
        $iqTestResults = $request->iq_test_results;
        $country = $request->country;
        $height = $request->height;
        $pictureUrl = $request->picture_url;
        $admissibilityScore = $request->admissibility_score;

        if (isset($name) && isset($age) && isset($gender) && isset($maritalStatus) && isset($iqTestResults) && isset($height) && isset($pictureUrl) && isset($admissibilityScore)) {
            $studentApplication = StudentApplication::create([
                'name' => $name,
                'age' => $age,
                'gender' => $gender,
                'marital_status' => $maritalStatus,
                'iq_test_results' => $iqTestResults,
                'country' => $country,
                'height' => $height,
                'picture_url' => $pictureUrl,
                'admissibility_score' => $admissibilityScore
            ]);
            if ($studentApplication) {
                return response()->json(StudentApplication::all(), 200);
            } else
                return response()->json([
                    'message' => ucwords('failed to save student application')
                ]);
        } else {
            return response()->json([
                'message' => ucwords('insufficient data')
            ]);
        }

    }

    public function getAllStudentApplications(): JsonResponse {
        return response()->json(StudentApplication::all());
    }

}
