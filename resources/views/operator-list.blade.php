@extends('layouts.operator-app')

@section('content')
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between mb-4">
                        <p></p>
                        <a href="{{ route('add-operator') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Petugas Baru</a>
                    </div>

                    @if ($users->isEmpty())
                        <p>Data User Tidak Ada</p>
                    @else
                        <table id="userTable" class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">No</th>
                                    <th class="px-4 py-2">No KTP</th>
                                    <th class="px-4 py-2">Nama</th>
                                    <th class="px-4 py-2">No Telpon</th>
                                    <th class="px-4 py-2">Alamat</th>
                                    <th class="px-4 py-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                        <td class="border px-4 py-2">{{ $user->id_card_no }}</td>
                                        <td class="border px-4 py-2">{{ $user->name }}</td>
                                        <td class="border px-4 py-2">{{ $user->phone }}</td>
                                        <td class="border px-4 py-2">{{ $user->address }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('operator-detail', $user->id) }}" class="bg-blue-500 text-white text-xs px-3 py-1 rounded hover:bg-blue-600">Edit</a>
                                            <a href="{{ route('delete-operator', $user->id) }}" class="bg-red-500 text-white text-xs px-3 py-1 rounded hover:bg-red-600">Delete</a>
                                        </td>
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
