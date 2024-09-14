<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class VerificationController extends Controller
{
    public function index() 
    {
        return view('home');
    }

    public function submit(Request $request) 
    {
        $request->validate([
            'id_card_no' => 'required|string',
        ]);

        $idCardNo = $request->input('id_card_no');

        $user = User::where('id_card_no', $idCardNo)->first();

        if ($user) {
            return redirect('/approvals');
        } else {
            return redirect('/add-approval');
        }
    }
}
