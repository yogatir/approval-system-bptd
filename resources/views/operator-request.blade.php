@extends('layouts.operator-app')

@section('content')
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <p class="hidden bg-green-300"></p>
                    <p class="hidden bg-orange-300"></p>
                    <p class="hidden bg-red-300"></p>
                    <p class="hidden bg-gray-300"></p>

                    @if ($approvals->isEmpty())
                        <p>Data Approval Tidak Ada</p>
                    @else
                        <table id="userTable" class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">No</th>
                                    <th class="px-4 py-2 w-1/4">Pemohon</th>
                                    <th class="px-4 py-2">Verifikasi Dokumen</th>
                                    <th class="px-4 py-2">Persetujuan Sewa</th>
                                    <th class="px-4 py-2">E-Billing</th>
                                    <th class="px-4 py-2">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($approvals as $approval)
                                @php
                                    $docStatus = getStatusClass($approval->doc_approval);
                                    $rentStatus = getStatusClass($approval->rental_approval);
                                @endphp
                                    <tr>
                                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                        <td class="border px-4 py-2">{{ $approval->user->name }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('operator-documents', ['approval' => $approval->id, 'action' => 'doc_approval']) }}" class="{{ $docStatus[1] }} text-black border-black border text-sm px-4 py-2 rounded-md">
                                                Lihat Dokumen
                                            </a>
                                        </td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('operator-documents', ['approval' => $approval->id, 'action' => 'rental_approval']) }}" class="{{ $rentStatus[1] }} text-black border-black border text-sm px-4 py-2 rounded-md">
                                                Lihat Dokumen
                                            </a>
                                        </td>
                                        <td class="border px-4 py-2"></td>
                                        <td class="border px-4 py-2">{{ $approval->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
