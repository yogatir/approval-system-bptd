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
<body style="background-image: url('{{ asset('storage/app/home-bg.jpeg') }}');" class="bg-cover bg-center bg-no-repeat min-h-[calc(100vh-64px)] w-full">

    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-24">
                <div class="flex items-center">
                    <img src="{{ asset('storage/app/navbar-logo.png') }}" alt="Logo" class="h-16 mr-3">
                </div>

                <div class="hidden md:flex space-x-6 items-center">
                    <div class="relative group">
                        <button id="mainDropdown" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-indigo-500 text-sm font-medium">
                            Informasi Layanan
                            <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div id="dropdownMenu" class="absolute hidden bg-white text-gray-700 py-2 w-48 border rounded shadow-md z-10">
                            <a href="{{ route('regulation') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Regulasi</a>
                            <div class="relative group">
                                <button class="px-4 py-2 text-sm inline-flex w-full hover:bg-gray-100" id="objekSewa">
                                    Objek Sewa
                                    
                                    <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <div id="submenu" class="absolute hidden bg-white text-gray-700 py-2 w-48 border rounded shadow-md z-10 left-full top-0">
                                    <a href="{{ route('terminal-mengwi') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Terminal Mengwi</a>
                                    <!-- <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Pelabuhan Sampalan</a> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    @auth
                        <div class="relative group">
                            <button class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-indigo-500 text-sm font-medium">
                                Permohonan
                                <svg class="w-5 h-5 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.292 7.292a1 1 0 011.416 0L10 10.586l3.292-3.294a1 1 0 011.416 1.416l-4 4a1 1 0 01-1.416 0l-4-4a1 1 0 010-1.416z" clip-rule="evenodd" />
                                </svg>
                            </button>

                            <div class="absolute left-0 mt-0 group-hover:block hidden bg-white text-gray-700 py-2 w-48 border rounded shadow-md z-10">
                                <a href="https://drive.google.com/drive/folders/1NJJc0_Xd-dbZLm6WvRWRU0FJWGsHyZft" class="block px-4 py-2 text-sm hover:bg-gray-100">Draft Dokumen Permohonan</a>
                                <a href="{{ route('add-approval') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Pengajuan Permohonan</a>
                            </div>
                        </div>
                    @else
                        <div class="relative group">
                            <button class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-indigo-500 text-sm font-medium">
                                Permohonan
                                <svg class="w-5 h-5 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.292 7.292a1 1 0 011.416 0L10 10.586l3.292-3.294a1 1 0 011.416 1.416l-4 4a1 1 0 01-1.416 0l-4-4a1 1 0 010-1.416z" clip-rule="evenodd" />
                                </svg>
                            </button>

                            <div class="absolute left-0 mt-0 group-hover:block hidden bg-white text-gray-700 py-2 w-48 border rounded shadow-md z-10">
                                <a href="https://drive.google.com/drive/folders/1NJJc0_Xd-dbZLm6WvRWRU0FJWGsHyZft" class="block px-4 py-2 text-sm hover:bg-gray-100">Draft Dokumen Permohonan</a>
                                <a href="#" class="openModal block px-4 py-2 text-sm hover:bg-gray-100">Pengajuan Permohonan</a>
                            </div>
                        </div>
                    @endauth

                    <a href="#" class="hover:border-indigo-500 text-gray-500 inline-flex items-center px-1 pt-1 border-b-2 text-sm border-transparent font-medium">
                        Survey Kepuasan Layanan
                    </a>

                    <a href="#" class="hover:border-indigo-500 text-gray-500 inline-flex items-center px-1 pt-1 border-b-2 text-sm border-transparent font-medium">
                        Customer Service
                    </a>

                    @auth
                        <a href="{{ route('sign-out') }}" class="hover:border-indigo-500 text-gray-500 inline-flex items-center px-1 pt-1 border-b-2 text-sm border-transparent font-medium">
                            Keluar
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
            <h2 class="text-xl font-semibold mb-4">Daftar / Masuk</h2>
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
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Masuk</button>
                    <button id="closeModal" type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 ml-3 rounded">Batal</button>
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
        $(document).ready(function() {
            $('#mainDropdown').on('mouseenter', function(e) {
                e.preventDefault();
                $('#dropdownMenu').toggle();
            });

            $('#objekSewa').on('mouseenter', function() {
                $('#submenu').show();
            }).on('mouseleave', function() {
                $('#submenu').hide();
            });

            $('#submenu').on('mouseenter', function() {
                $(this).show();
            }).on('mouseleave', function() {
                $(this).hide();
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('.filter-btn').click(function(){
                var target = $(this).data('target');
                
                $('.grid').addClass('hidden');
                
                $('#' + target).removeClass('hidden');
                
                $('.filter-btn').removeClass('bg-indigo-600 text-white').addClass('text-gray-700');
                $(this).removeClass('text-gray-700').addClass('bg-indigo-600 text-white');
                
                $('.description').addClass('hidden');
                $('#' + target + '-description').removeClass('hidden');
            });

            $('.filter-btn[data-target="all-satpel"]').trigger('click');
        });
    </script>
</body>
</html>
