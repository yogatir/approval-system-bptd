<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\User;
use App\Models\Approval;
use App\Models\Document;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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

        $approvals = Approval::where('user_id', $user->id)->with(['user', 'location'])->get();

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
            'location_id' => 'required|exists:locations,id',
            'file_id_card' => 'required|file|mimes:pdf|max:2048',
            'file_npwp' => 'required|file|mimes:pdf|max:2048',
            'file_document_request' => 'required|file|mimes:pdf|max:2048',
            'file_agreement' => 'required|file|mimes:pdf|max:2048',
            'file_permit' => 'required|file|mimes:pdf|max:2048',
            'file_image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048' 
        ]);

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
            'location_id' => $request->input('location_id')
        ]);
    
        $fileFields = [
            'file_id_card',
            'file_npwp',
            'file_document_request',
            'file_agreement',
            'file_permit',
            'file_image'
        ];
    
        $datetime = Carbon::now()->format('YmdHis');
    
        foreach ($fileFields as $fileField) {
            if ($request->hasFile($fileField)) {
                $fileType = '';
                switch ($fileField) {
                    case 'file_id_card':
                        $fileType = 'DOCUMENT_ID_CARD';
                        break;
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
                        $fileType = 'IMAGE';
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

        return redirect('/approval-list')->with('success', 'Approval added successfully!');
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
}
