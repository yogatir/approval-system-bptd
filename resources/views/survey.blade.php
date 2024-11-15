@extends('layouts.app')

@section('content')
    <div class="py-10">
        <div class="container mx-auto px-4 bg-white py-8">
            <form action="{{ route('survey-submit') }}" method="POST">
                @csrf

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold">Survei Kepuasan</h2>
                    <p class="text-gray-500">Silakan bagikan tanggapan Anda tentang pengalaman Anda dan pentingnya pengalaman tersebut:</p>
                </div>

                <div id="questions-container">
                    @foreach ($questions as $index => $question)
                        <div class="question-block flex flex-col md:flex-row items-center justify-between mb-10" data-index="{{ $index }}">
                            <div class="flex items-center justify-center md:justify-start md:w-2/4 text-center md:text-left h-full mb-4 md:mb-0">
                                <div>
                                    <h3 class="text-lg font-semibold">{{ $question->survey_text }}</h3>
                                    <p class="text-gray-500">Harap pilih opsi yang kami sediakan:</p>
                                </div>
                            </div>

                            <div class="md:w-2/4 space-y-6">
                                <div>
                                    <h4 class="text-md font-semibold mb-1">Satisfaction</h4>
                                    <div class="flex gap-2 justify-center md:justify-start">
                                        @foreach (range(1, 5) as $rating)
                                            <button type="button" data-rating="{{ $rating }}" class="satisfaction-option bg-gray-100 hover:bg-purple-200 p-2 flex items-center gap-2 rounded transition-colors text-left w-32" onclick="setRating('satisfaction_{{ $question->id }}', {{ $rating }}, this)">
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
                                            <button type="button" data-importance="{{ $importance }}" class="importance-option bg-gray-100 hover:bg-purple-200 p-2 flex items-center gap-2 rounded transition-colors text-left w-32" 
                                                    onclick="setRating('importance_{{ $question->id }}', {{ $importance }}, this)">
                                                <span class="text-2xl">{{ getEmoticon($importance) }}</span>
                                                <span class="text-xs">{{ getImportanceText($importance) }}</span>
                                            </button>
                                        @endforeach
                                        <input type="hidden" name="importance[{{ $question->id }}]" id="importance_{{ $question->id }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="flex justify-between mt-8">
                    <button id="prev-btn" type="button" class="px-4 py-2 bg-gray-300 text-gray-700 rounded" disabled>Previous</button>
                    <button id="next-btn" type="button" class="px-4 py-2 bg-blue-600 text-white rounded">Next</button>
                    <button id="submit-btn" type="submit" class="px-4 py-2 bg-blue-800 text-white rounded hidden">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let currentPage = 1;
        const recordsPerPage = 2;
        const questionsContainer = document.getElementById('questions-container');
        const questionBlocks = Array.from(questionsContainer.getElementsByClassName('question-block'));
        const totalPages = Math.ceil(questionBlocks.length / recordsPerPage);

        function updatePagination() {
            // Show and hide question blocks based on the current page
            questionBlocks.forEach((block, index) => {
                if (index >= (currentPage - 1) * recordsPerPage && index < currentPage * recordsPerPage) {
                    block.style.display = 'flex';
                } else {
                    block.style.display = 'none';
                }
            });

            // Disable/Enable the previous and next buttons
            document.getElementById('prev-btn').disabled = currentPage === 1;
            document.getElementById('next-btn').disabled = currentPage === totalPages;

            // Show Submit button if on the last page
            if (currentPage === totalPages) {
                document.getElementById('next-btn').classList.add('hidden');
                document.getElementById('submit-btn').classList.remove('hidden');
            } else {
                document.getElementById('next-btn').classList.remove('hidden');
                document.getElementById('submit-btn').classList.add('hidden');
            }
        }

        document.getElementById('prev-btn').addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                updatePagination();
            }
        });

        document.getElementById('next-btn').addEventListener('click', () => {
            if (currentPage < totalPages) {
                currentPage++;
                updatePagination();
            }
        });

        // Handle the rating button clicks and update classes
        function setRating(inputId, value, button) {
            // Reset the selected styles for all buttons in the group
            const buttons = button.parentElement.querySelectorAll('button');
            buttons.forEach(btn => {
                btn.classList.remove('bg-blue-800', 'text-white');
            });

            // Set the selected button styles
            button.classList.add('bg-blue-800', 'text-white');

            // Set the hidden input value
            document.getElementById(inputId).value = value;
        }

        // Initialize the pagination when the page loads
        updatePagination();
    </script>
@endsection
