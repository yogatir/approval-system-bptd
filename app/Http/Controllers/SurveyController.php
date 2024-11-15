<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SurveyQuestionnaire;
use App\Models\SurveyAnswer;
use App\Models\Location;
use App\Models\User;
use App\Models\Approval;
use App\Models\Document;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SurveyController extends Controller
{
    public function surveyView()
    {
        $questions = SurveyQuestionnaire::all();

        return view('survey', compact('questions'));
    }

    public function surveySubmit(Request $request)
    {
        $validated = $request->validate([
            'satisfaction' => 'required|array',
            'importance' => 'required|array',
            'satisfaction.*' => 'required|integer|min:1|max:5',
            'importance.*' => 'required|integer|min:1|max:5'
        ]);
        
        
        foreach ($validated['satisfaction'] as $key => $value) {
            if (is_null($value)) {
                return back()->withErrors(['satisfaction.' . $key => 'Satisfaction value cannot be null.']);
            }
        }

        foreach ($validated['importance'] as $key => $value) {
            if (is_null($value)) {
                return back()->withErrors(['importance.' . $key => 'Importance value cannot be null.']);
            }
        }

        if (session()->has('approvalData')) {
            $approvalData = session('approvalData');
            $filePaths = session('approvalFiles');

            $user = User::updateOrCreate(
                ['id_card_no' => $approvalData['id_card_no']], 
                $approvalData
            );

            $approval = Approval::create([
                'user_id' => $user->id,
                'request_type' => $approvalData['request_type'],
                'detail_location' => $approvalData['detail_location'],
                'location_id' => $approvalData['location_id']
            ]);

            foreach ($filePaths as $fileField => $fileInfo) {
                $tempPath = $fileInfo['path'];
                $fileType = $fileInfo['type'];

                $originalExtension = pathinfo($tempPath, PATHINFO_EXTENSION);
                $newFileName = $user->id . '_' . $approvalData['location_id'] . '_' . now()->format('Ymd_His') . '_' . $fileField . '.' . $originalExtension;

                $newFilePath = 'uploads/' . $newFileName;
                
                Storage::disk('public')->move($tempPath, $newFilePath);

                Document::create([
                    'user_id' => $user->id,
                    'approval_id' => $approval->id,
                    'title' => $newFileName,
                    'type' => $fileType,
                    'path' => $newFilePath
                ]);
            }
        } else {
            $user = auth()->user();
        }

        foreach ($validated['satisfaction'] as $questionId => $satisfaction) {
            $surveyAnswer = new SurveyAnswer();
            $surveyAnswer->user_id = $user->id;
            $surveyAnswer->survey_id = $questionId;
            $surveyAnswer->user_satisfaction = $satisfaction;
            $surveyAnswer->user_importance = $validated['importance'][$questionId];
            $surveyAnswer->save();
        }

        return redirect()->route('home');
    }
}
