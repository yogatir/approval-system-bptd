@extends('layouts.app')

@section('content')
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between mb-4">
                        <p></p>
                        <a href="{{ route('add-approval') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Permohonan Baru</a>
                    </div>

                    <table id="userTable" class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">No</th>
                                <th class="px-4 py-2">Pemohon</th>
                                <th class="px-4 py-2">Lokasi</th>
                                <th class="px-4 py-2">Tanggal</th>
                                <th class="px-4 py-2">Kode Billing</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if ($approvals->isEmpty())
                            <p>Data Approval Tidak Ada</p>
                        @else
                            <ul>
                                @foreach ($approvals as $approval)
                                @php
                                    $docStatus = getStatusClass($approval->doc_approval);
                                    $kpnlStatus = getStatusClass($approval->kpnl_approval);
                                    $centralStatus = getStatusClass($approval->central_approval);
                                @endphp
                                    <tr>
                                        <td class="border px-4 py-2">{{ $approval->id }}</td>
                                        <td class="border px-4 py-2">{{ $approval->user->name }}</td>
                                        <td class="border px-4 py-2">{{ $approval->location->name }}</td>
                                        <td class="border px-4 py-2">{{ $approval->created_at->format('Y-m-d') }}</td>
                                        <td class="border px-4 py-2">{{ $approval->billings->first()->code }}</td>
                                    </tr>
                                @endforeach
                            </ul>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
