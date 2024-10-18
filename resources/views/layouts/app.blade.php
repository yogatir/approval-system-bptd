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
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-24">
                <!-- Left Logo -->
                <div class="flex items-center">
                    <img src="{{ asset('storage/app/navbar-logo.png') }}" alt="Logo" class="h-16 mr-3">
                    <!-- Optional Text next to Logo -->
                </div>

                <!-- Right Menu -->
                <div class="hidden md:flex space-x-6 items-center">
                    <a href="#" class="text-gray-700 hover:text-gray-900">Informasi Layanan</a>
                    <!-- <a href="#" class="text-gray-700 hover:text-gray-900">Menu Permohonan</a> -->
                    <div class="relative">
                        <button class="text-white hover:text-gray-300 focus:outline-none" id="dropdownButton">
                            More
                        </button>
                        <div id="dropdownMenu" class="absolute bg-white text-gray-800 shadow-lg mt-2 w-48 rounded-lg hidden">
                            <div class="py-2">
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200">Menu E</a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200">Menu F</a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200">Menu G</a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200">Menu H</a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200">Menu I</a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-200">Menu J</a>
                                <!-- Add more menu items here -->
                            </div>
                        </div>
                    </div>
                    <a href="#" class="text-gray-700 hover:text-gray-900">Survey Kepuasan Layanan</a>
                    <a href="#" class="text-gray-700 hover:text-gray-900">Customer Service</a>
                    @auth
                        <a href="#" class="text-gray-700 hover:text-gray-900">Sign Out</a>
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

        <!-- Mobile Menu -->
        <div id="navMenu" class="md:hidden bg-white hidden">
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Menu A</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Menu B</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Menu C</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Menu D</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Menu E</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Menu F</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Menu G</a>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownButton = document.getElementById('dropdownButton');
            const dropdownMenu = document.getElementById('dropdownMenu');

            dropdownButton.addEventListener('mouseenter', () => {
                dropdownMenu.classList.remove('hidden');
            });

            dropdownButton.addEventListener('mouseleave', () => {
                dropdownMenu.classList.add('hidden');
            });

            dropdownMenu.addEventListener('mouseenter', () => {
                dropdownMenu.classList.remove('hidden');
            });

            dropdownMenu.addEventListener('mouseleave', () => {
                dropdownMenu.classList.add('hidden');
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownButton = document.getElementById('dropdownButton');
            const dropdownMenu = document.getElementById('dropdownMenu');

            dropdownButton.addEventListener('mouseenter', () => {
                dropdownMenu.classList.remove('hidden');
            });

            dropdownButton.addEventListener('mouseleave', () => {
                dropdownMenu.classList.add('hidden');
            });

            dropdownMenu.addEventListener('mouseenter', () => {
                dropdownMenu.classList.remove('hidden');
            });

            dropdownMenu.addEventListener('mouseleave', () => {
                dropdownMenu.classList.add('hidden');
            });
        });
    </script>
</body>
</html>
