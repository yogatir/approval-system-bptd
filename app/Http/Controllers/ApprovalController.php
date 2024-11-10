<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\User;
use App\Models\Approval;
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
            'location_id' => 'required|exists:locations,id',
            'file_id_card' => 'required|file|mimes:pdf|max:512',
            'file_npwp' => 'required|file|mimes:pdf|max:512',
            'file_document_request' => 'required|file|mimes:pdf|max:512',
            'file_agreement' => 'required|file|mimes:pdf|max:512',
            'file_permit' => 'required|file|mimes:pdf|max:512' 
        ]);

        DB::beginTransaction();

        try {
            $user = User::where('id_card_no', $request->input('id_card_no'))
                        ->orWhere('phone', $request->input('phone'))
                        ->first();

            if (!$user) {
                $user = User::create([
                    'id_card_no' => $request->input('id_card_no'),
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'instance' => $request->input('instance'),
                    'gender' => $request->input('gender'),
                    'phone' => $request->input('phone'),
                    'address' => $request->input('address')
                ]);

                Auth::login($user);
            } else {
                Auth::login($user);
            }

            $approval = Approval::create([
                'user_id' => $user->id,
                'request_type' => $request->input('request_type'),
                'detail_location' => $request->input('detail_location'),
                'location_id' => $request->input('location_id')
            ]);

            $fileFields = [
                'file_id_card',
                'file_npwp',
                'file_document_request',
                'file_agreement',
                'file_permit'
            ];
        
            $datetime = Carbon::now()->format('YmdHis');

            foreach ($fileFields as $fileField) {
                if ($request->hasFile($fileField)) {
                    $fileType = '';
                    switch ($fileField) {
                        case 'file_npwp':
                            $fileType = 'DOCUMENT_NPWP';
                            break;
                        case 'file_document_request':
                            $fileType = 'DOCUMENT_REQUEST';
                            break;
                        case 'file_agreement':
                            $fileType = 'DOCUMENT_AGREEMMENT';
                            break;
                        case 'file_permit':
                            $fileType = 'DOCUMENT_PERMIT';
                            break;
                        default:
                            $fileType = 'DOCUMENT_ID_CARD';
                            break;
                    }

                    $originalExtension = $request->file($fileField)->getClientOriginalExtension();
                    $fileName = $user->id . '_' . $request->input('location_id') . '_' . $datetime . '_' . $fileField . '.' . $originalExtension;
                    
                    $filePath = $request->file($fileField)->storeAs('uploads', $fileName, 'public');

                    Document::create([
                        'user_id' => $user->id,
                        'approval_id' => $approval->id,
                        'title' => $fileName,
                        'type' => $fileType,
                        'path' => $filePath
                    ]);
                }
            }

            DB::commit();

            return redirect('/approval-list')->with('success', 'Anda berhasil daftar!');
        } catch (\Exception $e) {
            DB::rollback();

            foreach ($fileFields as $fileField) {
                if ($request->hasFile($fileField)) {
                    $fileName = $user->id . '_' . $request->input('location_id') . '_' . $datetime . '_' . $fileField;
                    Storage::disk('public')->delete('uploads/' . $fileName);
                }
            }

            return redirect()->back()->with('error', 'Gagal melakukan pendaftaran. Silakan coba lagi.');
        }
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
