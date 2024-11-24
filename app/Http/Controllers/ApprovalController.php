<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\User;
use App\Models\Approval;
use App\Models\Floor;
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

        $akap = Floor::where('detail_location', 'like', 'A%')->where('is_used', 0)->get();
        $akdp = Floor::where('detail_location', 'like', 'D%')->where('is_used', 0)->get();
        $foodCourt = Floor::where('detail_location', 'like', 'FC%')->where('is_used', 0)->get();

        return view('add-approval', compact('locations','user', 'akap', 'akdp', 'foodCourt'));
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
            'file_id_card' => 'required|file|mimes:pdf|max:1024',
            'file_npwp' => 'required|file|mimes:pdf|max:1024',
            'file_document_request' => 'required|file|mimes:pdf|max:1024',
            'file_agreement' => 'required|file|mimes:pdf|max:1024',
            'file_permit' => 'required|file|mimes:pdf|max:1024',
        ], [
            'id_card_no.required' => 'Nomor KTP wajib diisi.',
            'id_card_no.string' => 'Nomor KTP harus berupa string.',
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa string.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus valid.',
            'gender.required' => 'Jenis kelamin wajib diisi.',
            'gender.in' => 'Jenis kelamin harus salah satu dari Laki-laki atau Perempuan.',
            'phone.required' => 'Nomor telepon wajib diisi.',
            'phone.string' => 'Nomor telepon harus berupa string.',
            'address.nullable' => 'Alamat boleh kosong.',
            'address.string' => 'Alamat harus berupa string.',
            'detail_location.required' => 'Lokasi detail wajib diisi.',
            'detail_location.string' => 'Lokasi detail harus berupa string.',
            'request_type.required' => 'Tipe permohonan wajib diisi.',
            'request_type.string' => 'Tipe permohonan harus berupa string.',
            'file_id_card.required' => 'File KTP wajib diunggah.',
            'file_id_card.file' => 'File KTP harus berupa file.',
            'file_id_card.mimes' => 'File KTP harus berformat PDF.',
            'file_id_card.max' => 'File KTP tidak boleh lebih dari 1024 KB.',
            'file_npwp.required' => 'File NPWP wajib diunggah.',
            'file_npwp.file' => 'File NPWP harus berupa file.',
            'file_npwp.mimes' => 'File NPWP harus berformat PDF.',
            'file_npwp.max' => 'File NPWP tidak boleh lebih dari 1024 KB.',
            'file_document_request.required' => 'File Surat Permohonan wajib diunggah.',
            'file_document_request.file' => 'File Surat Permohonan harus berupa file.',
            'file_document_request.mimes' => 'File Surat Permohonan harus berformat PDF.',
            'file_document_request.max' => 'File Surat Permohonan tidak boleh lebih dari 1024 KB.',
            'file_agreement.required' => 'File Surat Pernyataan Kesediaan Menjaga Objek Wisata wajib diunggah.',
            'file_agreement.file' => 'File Surat Pernyataan Kesediaan Menjaga Objek Wisata harus berupa file.',
            'file_agreement.mimes' => 'File Surat Pernyataan Kesediaan Menjaga Objek Wisata harus berformat PDF.',
            'file_agreement.max' => 'File Surat Pernyataan Kesediaan Menjaga Objek Wisata tidak boleh lebih dari 1024 KB.',
            'file_permit.required' => 'File Surat Ijin Usaha wajib diunggah.',
            'file_permit.file' => 'File Surat Ijin Usaha harus berupa file.',
            'file_permit.mimes' => 'File Surat Ijin Usaha harus berformat PDF.',
            'file_permit.max' => 'File Surat Ijin Usaha tidak boleh lebih dari 1024 KB.',
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
            if ($request->file($fileField)) {
                $originalExtension = $request->file($fileField)->getClientOriginalExtension();
                $fileName = $uuid . '_' . $locationId . '_' . $datetime . '_' . $fileField . '.' . $originalExtension;
        
                $filePath = 'images/temp/' . $fileName;
                $request->file($fileField)->move(public_path('images/temp'), $fileName);
        
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
