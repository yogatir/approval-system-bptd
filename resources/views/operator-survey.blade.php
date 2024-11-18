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

                    @if ($users->isEmpty())
                        <p>Data Survey Tidak Ada</p>
                    @else
                        <table id="userTable" class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">No</th>
                                    <th class="px-4 py-2 w-1/4">Pemohon</th>
                                    <th class="px-4 py-2">NIK Pemohon</th>
                                    <th class="px-4 py-2">Detail Survey</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $user->id }}</td>
                                        <td class="border px-4 py-2">{{ $user->name }}</td>
                                        <td class="border px-4 py-2">{{ $user->id_card_no }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('operator-survey-detail', ['user' => $user->id]) }}" class="bg-blue-300 text-black border-black border text-sm px-4 py-2 rounded-md">
                                                Lihat Survey
                                            </a>
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
