<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\User;
use App\Models\Approval;

class ApprovalController extends Controller
{
    public function addApprovalView()
    {
        $locations = Location::all();

        return view('add-approval', compact('locations'));
    }

    public function listApprovalView()
    {
        $approvals = Approval::all();

        return view('list-approval', compact('approvals'));
    }

    public function addApproval(Request $request)
    {
        $request->validate([
            'id_card_no' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'instance' => 'nullable|string',
            'gender' => 'required|in:MALE,FEMALE',
            'phone' => 'required|string',
            'address' => 'nullable|string',
            'location_id' => 'required|exists:locations,id'
        ]);

        $user = User::firstOrCreate([
            'id_card_no' => $request->input('id_card_no'),
            'phone' => $request->input('phone')
        ],
        [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'instance' => $request->input('instance'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address')
        ]);

        $approval = Approval::create([
            'user_id' => $user->id,
            'location_id' => $request->input('location_id')
        ]);

        return redirect('/approval-list')->with('success', 'Approval added successfully!');
    }

    public function approvalView()
    {
        $approvals = Approval::all();
        return view('approval-list', compact('approvals'));
    }
}
