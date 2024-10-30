<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function homePageView() 
    {
        return view('home');
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
            return redirect(route('approval-list'));
        } else {
            return redirect()->route('add-approval')->with([
                'id_card_no' => $idCardNo,
                'phone' => $phone
            ]);
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
