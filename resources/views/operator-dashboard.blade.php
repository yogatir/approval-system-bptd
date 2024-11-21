@extends('layouts.operator-app')

@section('content')
  <div class="py-10">
    <div class="container mx-auto px-4 py-8 bg-white shadow-sm px-10">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-semibold text-gray-700">
                Survei Kepuasan Pelayanan Pelanggan
            </h1>
        </div>

        <div class="grid grid-cols-5 gap-4 mb-8">
            @foreach ($counts as $level => $count)
                @php
                    $color = match($level) {
                        'VERY_GOOD' => 'green',
                        'GOOD' => 'blue',
                        'NORMAL' => 'yellow',
                        'BAD' => 'red',
                        default => 'gray',
                    };
                @endphp
                <div class="bg-{{ $color }}-100 text-center p-6 rounded-lg shadow">
                    <p class="text-4xl font-bold text-{{ $color }}-600">{{ $count }}</p>
                    <p class="text-lg font-medium text-gray-700">{{ $satisfactionLevels[$level] }}</p>
                </div>
            @endforeach
        </div>

        <div>
            @foreach ($percentages as $level => $percentage)
                @php
                    $color = match($level) {
                        'VERY_GOOD' => 'green',
                        'GOOD' => 'blue',
                        'NORMAL' => 'yellow',
                        'BAD' => 'red',
                        default => 'gray',
                    };
                @endphp
                <div class="mb-4">
                    <p class="text-gray-700 font-medium">{{ $satisfactionLevels[$level] }}</p>
                    <div class="w-full bg-gray-200 rounded-full h-4">
                        <div class="bg-{{ $color }}-500 h-4 rounded-full" style="width: {{ round($percentage, 2) }}%;"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
  </div>
@endsection
