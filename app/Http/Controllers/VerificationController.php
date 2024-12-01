<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VisitorLog;
use App\Models\SurveyAnswer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function homePageView() 
    {
        $totalVisits = VisitorLog::count();
        $thisMonthVisits = VisitorLog::whereBetween('created_at', [
            now()->startOfMonth(),
            now()->endOfMonth()
        ])->count();

        $answers = SurveyAnswer::select('user_satisfaction')->get();

        $satisfactionLevels = [
            'VERY_GOOD' => 'Sangat Puas',
            'GOOD' => 'Puas',
            'NORMAL' => 'Kurang Puas',
            'BAD' => 'Tidak Puas',
            'VERY_BAD' => 'Sangat Tidak Puas',
        ];

        $counts = [
            'VERY_GOOD' => 0,
            'GOOD' => 0,
            'NORMAL' => 0,
            'BAD' => 0,
            'VERY_BAD' => 0,
        ];

        foreach ($answers as $answer) {
            if (isset($counts[$answer->user_satisfaction])) {
                $counts[$answer->user_satisfaction]++;
            }
        }

        $totalResponses = array_sum($counts);

        $percentages = [];
        foreach ($counts as $level => $count) {
            $percentages[$level] = $totalResponses > 0 ? ($count / $totalResponses) * 100 : 0;
        }

        return view('home', compact('totalVisits', 'thisMonthVisits','satisfactionLevels', 'counts', 'percentages', 'totalResponses'));
    }

    public function operatorView() 
    {
        return view('operator-login');
    }

    public function verificationCheck(Request $request) 
    {
        $request->validate([
            'id_card_no' => 'required|string',
            'phone' => 'required|string'
        ]);

        $idCardNo = $request->input('id_card_no');
        $phone = $request->input('phone');

        $user = User::where('id_card_no', $idCardNo)
                ->where('phone', $phone)
                ->where('role', 'APPLICANT')
                ->first();

        if ($user) {
            Auth::login($user);
            if ($request->input('redirect_route') === 'survey') {
                return redirect(route('survey'));
            } else {
                return redirect(route('approval-list'));
            }
        } else {
            if ($request->input('redirect_route') === 'survey') {
                return redirect()->route('survey')->with([
                    'id_card_no' => $idCardNo,
                    'phone' => $phone
                ]);
            } else {
                return redirect()->route('add-approval')->with([
                    'id_card_no' => $idCardNo,
                    'phone' => $phone
                ]);
            }
        }
    }

    public function operatorVerificationCheck(Request $request) 
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            Auth::login($user);
    
            return redirect('/operator-dashboard')->with('success', 'Login successful!');
        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
        }
    }

    public function verificationFlush(Request $request) 
    {
        $request->session()->flush();

        return redirect('/')->with('success', 'Session cleared successfully.');
    }
}
