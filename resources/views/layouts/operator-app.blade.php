<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home Page</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-24">
                <!-- Left Logo -->
                <div class="flex items-center">
                    <img src="{{ asset('storage/app/navbar-logo.png') }}" alt="Logo" class="h-16 mr-3">
                    <!-- Optional Text next to Logo -->
                </div>

                <div class="hidden md:flex space-x-6 items-center">

                    <a href="{{ route('operator-dashboard') }}" class="hover:border-indigo-500 text-gray-500 inline-flex items-center px-1 pt-1 border-b-2 text-lg border-transparent font-medium">
                        Dashboard
                    </a>

                    <a href="{{ route('operator-billing') }}" class="hover:border-indigo-500 text-gray-500 inline-flex items-center px-1 pt-1 border-b-2 text-lg border-transparent font-medium">
                        E-Billing
                    </a>

                    <a href="{{ route('operator-list') }}" class="hover:border-indigo-500 text-gray-500 inline-flex items-center px-1 pt-1 border-b-2 text-lg border-transparent font-medium">
                        Petugas
                    </a>

                    @auth
                        <a href="{{ route('sign-out') }}" class="hover:border-indigo-500 text-gray-500 inline-flex items-center px-1 pt-1 border-b-2 text-lg border-transparent font-medium">
                            Sign Out
                        </a>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="navToggle" class="text-gray-700 hover:text-gray-900 focus:outline-none">
                        <!-- Hamburger Icon -->
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Modal Background -->
    <div id="ktpModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden z-50">
        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-lg p-6 w-96">
            <h2 class="text-xl font-semibold mb-4">Login</h2>
            <form id="ktpForm" method="POST" action="{{ route('submit-id-card-no') }}">
                @csrf
                <div class="mb-4">
                    <label for="ktp" class="block text-sm font-medium text-gray-700">No KTP</label>
                    <input type="text" name="id_card_no" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">No Telp</label>
                    <input type="text" name="phone" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Login</button>
                    <button id="closeModal" type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 ml-3 rounded">Cancel</button>
                </div>
            </form>
        </div>
    </div>


    <!-- Scripts -->
     @vite('resources/js/app.js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openModalButtons = document.getElementsByClassName('openModal'); // Note the plural
            const modal = document.getElementById('ktpModal');
            const closeModalButton = document.getElementById('closeModal');

            // Add click event listeners to all buttons with the class 'openModal'
            Array.from(openModalButtons).forEach(button => {
                button.addEventListener('click', function() {
                    modal.classList.remove('hidden');
                });
            });

            // Close the modal
            closeModalButton.addEventListener('click', function() {
                modal.classList.add('hidden');
            });

            // Optional: Close modal on outside click
            modal.addEventListener('click', function(event) {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>
