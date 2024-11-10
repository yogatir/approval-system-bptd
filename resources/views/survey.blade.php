@extends('layouts.app')

@section('content')
    <div class="py-10">
        <div class="container mx-auto px-4 bg-white py-8">
        <!-- Survey Title -->
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold">How was your experience using our web app?</h2>
                <p class="text-gray-500">Let us know by selecting an option below:</p>
            </div>

            <!-- Satisfaction Options -->
            <div class="flex justify-center gap-4">
                <!-- Terrible -->
                <button data-rating="1" class="survey-option bg-gray-100 hover:bg-red-200 p-4 rounded-lg text-center transition-colors">
                    <div class="text-3xl">😡</div>
                    <span class="block mt-2 font-medium text-sm">Terrible</span>
                </button>

                <!-- Not Great -->
                <button data-rating="2" class="survey-option bg-gray-100 hover:bg-yellow-200 p-4 rounded-lg text-center transition-colors">
                    <div class="text-3xl">🙁</div>
                    <span class="block mt-2 font-medium text-sm">Not Great</span>
                </button>

                <!-- Okay -->
                <button data-rating="3" class="survey-option bg-gray-100 hover:bg-blue-200 p-4 rounded-lg text-center transition-colors">
                    <div class="text-3xl">😐</div>
                    <span class="block mt-2 font-medium text-sm">Okay</span>
                </button>

                <!-- Liked It -->
                <button data-rating="4" class="survey-option bg-gray-100 hover:bg-green-200 p-4 rounded-lg text-center transition-colors">
                    <div class="text-3xl">🙂</div>
                    <span class="block mt-2 font-medium text-sm">Liked It</span>
                </button>

                <!-- Loved It -->
                <button data-rating="5" class="survey-option bg-gray-100 hover:bg-purple-200 p-4 rounded-lg text-center transition-colors">
                    <div class="text-3xl">😍</div>
                    <span class="block mt-2 font-medium text-sm">Loved It</span>
                </button>
            </div>
        </div>

        <!-- Add jQuery for click event handling -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function(){
                // Handle click on each option
                $('.survey-option').click(function(){
                    // Reset all options to default color
                    $('.survey-option').removeClass('bg-blue-500 text-white').addClass('bg-gray-100');

                    // Highlight the selected option
                    $(this).removeClass('bg-gray-100').addClass('bg-blue-500 text-white');

                    // Retrieve selected rating
                    var rating = $(this).data('rating');
                    console.log('User selected rating:', rating);

                    // Optionally, you could send the rating to the server or show a thank-you message
                });
            });
        </script>
    </div>
@endsection
