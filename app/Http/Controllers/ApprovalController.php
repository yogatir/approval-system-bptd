<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\User;
use App\Models\Approval;
use Illuminate\Support\Str;
use App\Models\Document;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ApprovalController extends Controller
{
    public function addApprovalView()
    {
        $locations = Location::all();
        $user = auth()->user();

        return view('add-approval', compact('locations','user'));
    }

    public function listApprovalView()
    {
        $user = auth()->user();

        $approvals = Approval::where('user_id', $user->id)->with(['user', 'location','billings','documents' => function ($query) {
            $query->where('type', 'DOCUMENT_BILLING');
        }])->get();

        return view('list-approval', compact('approvals'));
    }

    public function listBillingView()
    {
        $user = auth()->user();

        $approvals = Approval::with(['user', 'location', 'billings'])->whereHas('user', function ($query) {
            $query->where('role', 'APPLICANT');
        })->whereHas('billings')->where('doc_approval', 2)->where('kpnl_approval', 2)->where('central_approval', 2)->where('user_id', $user->id)->get();

        return view('list-billing', compact('approvals'));
    }

    public function addApproval(Request $request)
    {
        $request->validate([
            'id_card_no' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'gender' => 'required|in:MALE,FEMALE',
            'phone' => 'required|string',
            'address' => 'nullable|string',
            'detail_location' => 'required|string',
            'request_type' => 'required|string',
            'file_id_card' => 'required|file|mimes:pdf|max:512',
            'file_npwp' => 'required|file|mimes:pdf|max:512',
            'file_document_request' => 'required|file|mimes:pdf|max:512',
            'file_agreement' => 'required|file|mimes:pdf|max:512',
            'file_permit' => 'required|file|mimes:pdf|max:512',
        ]);
    
        $datetime = now()->format('Ymd_His');
        $locationId = $request->input('location_id');
        $uuid = (string) Str::uuid();
    
        $fileFields = [
            'file_id_card' => 'DOCUMENT_ID_CARD',
            'file_npwp' => 'DOCUMENT_NPWP',
            'file_document_request' => 'DOCUMENT_REQUEST',
            'file_agreement' => 'DOCUMENT_AGREEMENT',
            'file_permit' => 'DOCUMENT_PERMIT',
        ];
    
        $filePaths = [];
    
        foreach ($fileFields as $fileField => $fileType) {
            if ($request->hasFile($fileField)) {
                $originalExtension = $request->file($fileField)->getClientOriginalExtension();
                $fileName = $uuid . '_' . $locationId . '_' . $datetime . '_' . $fileField . '.' . $originalExtension;
    
                $filePath = $request->file($fileField)->storeAs('temps', $fileName, 'public');
    
                $filePaths[$fileField] = [
                    'path' => $filePath,
                    'type' => $fileType
                ];
            }
        }
    
        session([
            'approvalFiles' => $filePaths,
            'approvalData' => $request->only([
                'id_card_no', 'name', 'email', 'gender', 'phone', 'address', 'detail_location', 'request_type', 'location_id'
            ])
        ]);
    
        return redirect('/survey');
    }

    public function approvalView()
    {
        $approvals = Approval::all();
        return view('approval-list', compact('approvals'));
    }

    public function getStatusClass($status)
    {
        return match ($status) {
            0 => ['Menunggu Proses', 'bg-gray-200 text-gray-700'],
            1 => ['Dalam Proses', 'bg-orange-200 text-orange-700'],
            2 => ['Disetujui', 'bg-green-200 text-green-700'],
            3 => ['Ditolak', 'bg-red-200 text-red-700'],
            default => ['Unknown', 'bg-gray-200 text-gray-700'],
        };
    }

    public function regulationView()
    {
        return view('regulation');
    }
}
