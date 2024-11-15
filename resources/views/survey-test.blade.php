@extends('layouts.app')

@section('content')
    <div class="py-10">
        <div class="container mx-auto px-4 bg-white py-8">
            <form action="{{ $isLastPage ? route('survey-submit') : route('survey') }}" method="POST">
                @csrf

                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold">Survei Kepuasan</h2>
                    <p class="text-gray-500">Silakan bagikan tanggapan Anda tentang pengalaman Anda:</p>
                </div>

                @foreach ($pagedQuestions as $question)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold">{{ $question->survey_text }}</h3>
                        <div class="mb-4">
                            <h4 class="text-md font-semibold mb-1">Satisfaction</h4>
                            <div class="flex gap-2 justify-center md:justify-start">
                                @foreach (range(1, 5) as $rating)
                                    <button type="button" data-rating="{{ $rating }}" 
                                            class="satisfaction-option bg-gray-100 p-2 w-20 rounded" onclick="setRating('satisfaction_{{ $question->id }}', {{ $rating }})">
                                        <span class="text-2xl">{{ getEmoticon($rating) }}</span>
                                        <span class="text-xs">{{ getRatingText($rating) }}</span>
                                    </button>
                                @endforeach
                                <input type="hidden" name="satisfaction[{{ $question->id }}]" id="satisfaction_{{ $question->id }}">
                            </div>
                        </div>

                        <div>
                            <h4 class="text-md font-semibold mb-1">Importance</h4>
                            <div class="flex gap-2 justify-center md:justify-start">
                                @foreach (range(1, 5) as $importance)
                                    <button type="button" data-importance="{{ $importance }}" 
                                            class="importance-option bg-gray-100 p-2 w-20 rounded" 
                                            onclick="setRating('importance_{{ $question->id }}', {{ $importance }})">
                                        <span class="text-2xl">{{ getEmoticon($importance) }}</span>
                                        <span class="text-xs">{{ getImportanceText($importance) }}</span>
                                    </button>
                                @endforeach
                                <input type="hidden" name="importance[{{ $question->id }}]" id="importance_{{ $question->id }}">
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="flex justify-between">
                    @if ($page > 1)
                        <a href="{{ route('survey', ['page' => $page - 1]) }}" class="btn">Previous</a>
                    @endif

                    @if ($isLastPage)
                        <button type="submit" class="btn">Submit</button>
                    @else
                        <a href="{{ route('survey', ['page' => $page + 1]) }}" class="btn">Next</a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <script>
        function setRating(inputId, value) {
            document.getElementById(inputId).value = value;
        }
    </script>
@endsection
