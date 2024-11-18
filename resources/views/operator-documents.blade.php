@extends('layouts.operator-app')

@section('content')
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if ($documents->isEmpty())
                        <p>Data Approval Tidak Ada</p>
                    @else
                        <table id="userTable" class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">No</th>
                                    <th class="px-4 py-2">Tipe</th>
                                    <th class="px-4 py-2">Nama</th>
                                    <th class="px-4 py-2">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documents as $document)
                                <tr>
                                    <td class="border px-4 py-2">{{ $document->id }}</td>
                                    <td class="border px-4 py-2">
                                    @switch($document->type)
                                        @case('DOCUMENT_ID_CARD')
                                            KTP
                                            @break
                                        @case('DOCUMENT_NPWP')
                                            NPWP
                                            @break
                                        @case('DOCUMENT_REQUEST')
                                            Surat Permohonan Sewa
                                            @break
                                        @case('DOCUMENT_AGREEMENT')
                                            Surat Pernyataan Kesediaan Menjaga Objek Sewa
                                            @break
                                        @case('DOCUMENT_PERMIT')
                                            Scan / Fotokopi Surat Ijin Usaha
                                            @break
                                    @endswitch
                                    </td>
                                    <td class="border px-4 py-2">{{ $document->title }}</td>
                                    <td class="text-center border px-4 py-2">
                                        <a href="{{ asset('storage/'. $document->path) }}" target="_blank" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                            Buka File
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>

                <div class="flex justify-end mt-4 mr-4 mb-4">
                    <form action="{{ route('update-approval', $approval) }}" method="POST" class="space-x-2">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Keterangan</label>
                            <textarea name="description" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                        </div> 
                        
                        <input type="hidden" name="column_name" value="{{ $action }}">

                        <button type="submit" name="action" value="2" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                            Setujui
                        </button>

                        <button type="submit" name="action" value="3" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                            Tolak
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
