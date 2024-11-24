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

                    @if ($surveys->isEmpty())
                        <p>Data Survey Tidak Ada</p>
                    @else
                        <table id="userTable" class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">No</th>
                                    <th class="px-4 py-2">Pertanyaan</th>
                                    <th class="px-4 py-2">Kepuasan</th>
                                    <th class="px-4 py-2">Kepentingan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($surveys as $survey)
                                <tr>
                                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="border px-4 py-2">{{ $survey->survey_id }}</td>
                                    <td class="border px-4 py-2">{{ $survey->user_satisfaction }}</td>
                                    <td class="border px-4 py-2">{{ $survey->user_importance }}</td>
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
