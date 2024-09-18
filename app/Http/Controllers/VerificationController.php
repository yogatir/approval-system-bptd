<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class VerificationController extends Controller
{
    public function homePageView() 
    {
        return view('home');
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
                ->first();

        if ($user) {
            return redirect('/approval');
        } else {
            return redirect()->route('add-approval')->with([
                'id_card_no' => $idCardNo,
                'phone' => $phone
            ]);
        }
    }
}
