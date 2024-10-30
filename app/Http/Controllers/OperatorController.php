<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Approval;
use App\Models\Billing;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OperatorController extends Controller
{

    public function dashboardView()
    {
        $approvals = Approval::with(['user', 'location', 'documents'])->whereHas('user', function ($query) {
            $query->where('role', 'APPLICANT');
        })->get();

        return view('operator-dashboard', compact('approvals'));
    }

    public function billingView()
    {
        $approvals = Approval::with(['user', 'location', 'billings'])->whereHas('user', function ($query) {
            $query->where('role', 'APPLICANT');
        })->where('doc_approval', 2)->where('kpnl_approval', 2)->where('central_approval', 2)->get();

        return view('operator-billing', compact('approvals'));
    }

    public function documentView(Approval $approval, $action)
    {
        $documents = $approval->documents;

        return view('operator-documents', compact('approval', 'documents', 'action'));
    }

    public function updateApproval(Approval $approval, Request $request) 
    {
        if (
            ($approval->doc_approval == 2 && $approval->rental_approval == 2) || 
            ($approval->doc_approval == 3 || $approval->rental_approval == 3)
        ) 
        {
            return redirect()->back()->with('error', 'Not allowed to update this data.');
        }

        $rules = [
            'action' => 'required|in:0,1,2,3',
            'column_name' => 'required|string'
        ];

        if ($request->input('action') == 3) {
            $rules['description'] = 'required|string';
        }

        $request->validate($rules);

        $approval->update(
            [
                $request->input('column_name') => $request->input('action'),
                'description' => $request->input('description')
            ]
        );

        return redirect(route('operator-dashboard'));
    }

    public function addBillingView(Approval $approval)
    {
        return view('add-billing', compact('approval'));
    }

    public function submitBilling(Request $request)
    {
        $request->validate([
            'approval_id' => 'required|integer|exists:approvals,id',
            'code' => 'required|string',
            'description' => 'nullable|string'
        ]);

        Billing::create([
            'approval_id' => $request->input('approval_id'),
            'code' => $request->input('code'),
            'description' => $request->input('description')
        ]);

        return redirect(route('operator-billing'));
    }

    public function operatorListView()
    {
        $users = User::where('role', 'OPERATOR')->get();

        return view('operator-list', compact('users'));
    }

    public function operatorDetailView(User $user)
    {
        return view('set-operator', compact('user'));
    }

    public function submitOperator(Request $request)
    {
        $request->validate([
            'id_card_no' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'instance' => 'nullable|string',
            'gender' => 'required|in:MALE,FEMALE',
            'phone' => 'required|string',
            'address' => 'nullable|string',
            'password' => 'required|string',
            'confirm_password' => 'required|string'
        ]);

        if ($request->input('password') !== $request->input('confirm_password')) {
            return redirect()->back()->with('error', 'Confirm password is not same.');
        }

        User::updateOrCreate(
            [
                'email' => $request->input('email'),
                'role' => 'OPERATOR'
            ],
            [
                'id_card_no' => $request->input('id_card_no'),
                'phone' => $request->input('phone'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'instance' => $request->input('instance'),
                'gender' => $request->input('gender'),
                'address' => $request->input('address')
            ]
        );

        return redirect(route('operator-list'));
    }

    public function destroyOperator(User $user) 
    {
        $user->delete();

        return redirect()->route('operator-list')->with('success', 'User deleted successfully!');
    }
}
