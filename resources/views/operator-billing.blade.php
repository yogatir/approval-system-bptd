@extends('layouts.operator-app')

@section('content')
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if ($approvals->isEmpty())
                        <p>Data Approval Tidak Ada</p>
                    @else
                        <table id="userTable" class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">No</th>
                                    <th class="px-4 py-2">Pemohon</th>
                                    <th class="px-4 py-2">Lokasi</th>
                                    <th class="px-4 py-2">Tanggal</th>
                                    <th class="px-4 py-2">Keterangan</th>
                                    <th class="px-4 py-2">Billing</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                        <td class="border px-4 py-2">{{ $approval->created_at }}</td>
                                        <td class="border px-4 py-2">{{ $approval->description }}</td>
                                        @if ($approval->billings && $approval->billings->count() > 0)
                                            <td class="border px-4 py-2">{{ $approval->billings->first()->code }}</td>
                                        @else
                                            <td class="border px-4 py-2"><a href="{{ route('operator-add-billing', $approval->id) }}" 
                                                class="bg-blue-400 text-white text-black border-black border font-sm px-4 py-2 rounded-md">
                                                    Buat Billing
                                                </a>
                                            </td>
                                        @endif
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
