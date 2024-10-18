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
        $approvals = Approval::with(['user', 'location', 'documents'])->whereHas('user', function ($query) {
            $query->where('role', 'APPLICANT');
        })->where('doc_approval', 2)->where('kpnl_approval', 2)->where('central_approval', 2)->get();

        return view('operator-billing', compact('approvals'));
    }

    public function documentView(Approval $approval, $action)
    {
        $documents = $approval->documents;

        return view('operator-documents', compact('approval', 'documents', 'action'));
    }

    public function addBillingView(Approval $approval)
    {
        return view('add-billing', compact('approval'));
    }

    public function submitBilling(Request $request)
    {
        $request->validate([
            'approval_id' => 'required|approval_id',
            'code' => 'required|string',
            'description' => 'required|string'
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
            'address' => 'nullable|string'
        ]);

        User::updateOrCreate(
            [
                'phone' => $request->input('phone'),
                'id_card_no' => $request->input('id_card_no')
            ],
            [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'instance' => $request->input('instance'),
                'gender' => $request->input('gender'),
                'role' => 'OPERATOR',
                'address' => $request->input('address')
            ]
        );

        return redirect(route('operator-list'));
    }
}
