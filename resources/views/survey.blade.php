@extends('layouts.app')

@section('content')
    <div class="py-10">
        <div class="container mx-auto px-4 bg-white py-8">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold">Survei Kepuasan</h2>
                <p class="text-gray-500">Silakan bagikan tanggapan Anda tentang pengalaman Anda dan pentingnya pengalaman tersebut:</p>
            </div>

            <div id="question-container" class="space-y-6">
                <div class="question-page" data-page="1">
                    <div class="flex flex-col md:flex-row items-center justify-between">
                        <div class="flex items-center justify-center md:justify-start md:w-2/4 text-center md:text-left h-full mb-4 md:mb-0">
                            <div>
                                <h3 class="text-lg font-semibold">How was your experience using our web app?</h3>
                                <p class="text-gray-500">Let us know by selecting an option:</p>
                            </div>
                        </div>
        
                        <div class="md:w-2/4 space-y-6">
                            <div>
                                <h4 class="text-md font-semibold mb-1">Satisfaction</h4>
                                <div class="flex gap-2 justify-center md:justify-start">
                                    <button data-rating="1" class="survey-option bg-gray-100 hover:bg-red-200 p-2 flex items-center gap-2 rounded transition-colors text-left w-32">
                                        <div class="text-2xl">😡</div>
                                        <span class="font-medium text-xs">Terrible</span>
                                    </button>
                                    <button data-rating="2" class="survey-option bg-gray-100 hover:bg-yellow-200 p-2 flex items-center gap-2 rounded transition-colors text-left w-32">
                                        <div class="text-2xl">🙁</div>
                                        <span class="font-medium text-xs">Not Great</span>
                                    </button>
                                    <button data-rating="3" class="survey-option bg-gray-100 hover:bg-blue-200 p-2 flex items-center gap-2 rounded transition-colors text-left w-32">
                                        <div class="text-2xl">😐</div>
                                        <span class="font-medium text-xs">Okay</span>
                                    </button>
                                    <button data-rating="4" class="survey-option bg-gray-100 hover:bg-green-200 p-2 flex items-center gap-2 rounded transition-colors text-left w-32">
                                        <div class="text-2xl">🙂</div>
                                        <span class="font-medium text-xs">Liked It</span>
                                    </button>
                                    <button data-rating="5" class="survey-option bg-gray-100 hover:bg-purple-200 p-2 flex items-center gap-2 rounded transition-colors text-left w-32">
                                        <div class="text-2xl">😍</div>
                                        <span class="font-medium text-xs">Loved It</span>
                                    </button>
                                </div>
                            </div>
        
                            <div>
                                <h4 class="text-md font-semibold mb-1">Importance</h4>
                                <div class="flex gap-2 justify-center md:justify-start">
                                    <button data-importance="1" class="importance-option bg-gray-100 hover:bg-red-200 p-2 flex items-center gap-2 rounded transition-colors text-left w-32">
                                        <div class="text-2xl">😡</div>
                                        <span class="font-medium text-xs">Not Important</span>
                                    </button>
                                    <button data-importance="2" class="importance-option bg-gray-100 hover:bg-yellow-200 p-2 flex items-center gap-2 rounded transition-colors text-left w-32">
                                        <div class="text-2xl">🙁</div>
                                        <span class="font-medium text-xs">Slightly Important</span>
                                    </button>
                                    <button data-importance="3" class="importance-option bg-gray-100 hover:bg-blue-200 p-2 flex items-center gap-2 rounded transition-colors text-left w-32">
                                        <div class="text-2xl">😐</div>
                                        <span class="font-medium text-xs">Moderate</span>
                                    </button>
                                    <button data-importance="4" class="importance-option bg-gray-100 hover:bg-green-200 p-2 flex items-center gap-2 rounded transition-colors text-left w-32">
                                        <div class="text-2xl">🙂</div>
                                        <span class="font-medium text-xs">Important</span>
                                    </button>
                                    <button data-importance="5" class="importance-option bg-gray-100 hover:bg-purple-200 p-2 flex items-center gap-2 rounded transition-colors text-left w-32">
                                        <div class="text-2xl">😍</div>
                                        <span class="font-medium text-xs">Very Important</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="question-page" data-page="2">
                    <div class="flex flex-col md:flex-row items-center justify-between">
                        <div class="flex items-center justify-center md:justify-start md:w-2/4 text-center md:text-left h-full mb-4 md:mb-0">
                            <div>
                                <h3 class="text-lg font-semibold">How was your experience using our web app 2?</h3>
                                <p class="text-gray-500">Let us know by selecting an option:</p>
                            </div>
                        </div>
        
                        <div class="md:w-2/4 space-y-6">
                            <div>
                                <h4 class="text-md font-semibold mb-1">Satisfaction</h4>
                                <div class="flex gap-2 justify-center md:justify-start">
                                    <button data-rating="1" class="survey-option bg-gray-100 hover:bg-red-200 p-2 flex items-center gap-2 rounded transition-colors text-left w-32">
                                        <div class="text-2xl">😡</div>
                                        <span class="font-medium text-xs">Terrible</span>
                                    </button>
                                    <button data-rating="2" class="survey-option bg-gray-100 hover:bg-yellow-200 p-2 flex items-center gap-2 rounded transition-colors text-left w-32">
                                        <div class="text-2xl">🙁</div>
                                        <span class="font-medium text-xs">Not Great</span>
                                    </button>
                                    <button data-rating="3" class="survey-option bg-gray-100 hover:bg-blue-200 p-2 flex items-center gap-2 rounded transition-colors text-left w-32">
                                        <div class="text-2xl">😐</div>
                                        <span class="font-medium text-xs">Okay</span>
                                    </button>
                                    <button data-rating="4" class="survey-option bg-gray-100 hover:bg-green-200 p-2 flex items-center gap-2 rounded transition-colors text-left w-32">
                                        <div class="text-2xl">🙂</div>
                                        <span class="font-medium text-xs">Liked It</span>
                                    </button>
                                    <button data-rating="5" class="survey-option bg-gray-100 hover:bg-purple-200 p-2 flex items-center gap-2 rounded transition-colors text-left w-32">
                                        <div class="text-2xl">😍</div>
                                        <span class="font-medium text-xs">Loved It</span>
                                    </button>
                                </div>
                            </div>
        
                            <div>
                                <h4 class="text-md font-semibold mb-1">Importance</h4>
                                <div class="flex gap-2 justify-center md:justify-start">
                                    <button data-importance="1" class="importance-option bg-gray-100 hover:bg-red-200 p-2 flex items-center gap-2 rounded transition-colors text-left w-32">
                                        <div class="text-2xl">😡</div>
                                        <span class="font-medium text-xs">Not Important</span>
                                    </button>
                                    <button data-importance="2" class="importance-option bg-gray-100 hover:bg-yellow-200 p-2 flex items-center gap-2 rounded transition-colors text-left w-32">
                                        <div class="text-2xl">🙁</div>
                                        <span class="font-medium text-xs">Slightly Important</span>
                                    </button>
                                    <button data-importance="3" class="importance-option bg-gray-100 hover:bg-blue-200 p-2 flex items-center gap-2 rounded transition-colors text-left w-32">
                                        <div class="text-2xl">😐</div>
                                        <span class="font-medium text-xs">Moderate</span>
                                    </button>
                                    <button data-importance="4" class="importance-option bg-gray-100 hover:bg-green-200 p-2 flex items-center gap-2 rounded transition-colors text-left w-32">
                                        <div class="text-2xl">🙂</div>
                                        <span class="font-medium text-xs">Important</span>
                                    </button>
                                    <button data-importance="5" class="importance-option bg-gray-100 hover:bg-purple-200 p-2 flex items-center gap-2 rounded transition-colors text-left w-32">
                                        <div class="text-2xl">😍</div>
                                        <span class="font-medium text-xs">Very Important</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-between mt-8">
                <button id="prev-btn" class="px-4 py-2 bg-gray-300 text-gray-700 rounded">Previous</button>
                <button id="next-btn" class="px-4 py-2 bg-blue-600 text-white rounded">Next</button>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            const prevButton = document.getElementById('prev-btn');
            const nextButton = document.getElementById('next-btn');
            const questionPages = document.querySelectorAll('.question-page');
            let currentPage = 1;

            // Show current page and hide others
            function updatePage() {
                questionPages.forEach(page => {
                    page.style.display = page.dataset.page == currentPage ? 'block' : 'none';
                });
            }

            // Handle Next Button Click
            nextButton.addEventListener('click', () => {
                if (currentPage < questionPages.length) {
                    currentPage++;
                    updatePage();
                }
            });

            // Handle Previous Button Click
            prevButton.addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    updatePage();
                }
            });

            // Initialize page
            updatePage();
        </script>
    </div>
@endsection
