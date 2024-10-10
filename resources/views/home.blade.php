<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex space-x-8">
                    <div class="relative group">
                        <button class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-500 text-gray-500 text-gray-900 text-sm font-medium">
                            Informasi Layanan
                            <svg class="w-5 h-5 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.292 7.292a1 1 0 011.416 0L10 10.586l3.292-3.294a1 1 0 011.416 1.416l-4 4a1 1 0 01-1.416 0l-4-4a1 1 0 010-1.416z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div class="absolute left-0 mt-0 group-hover:block hidden bg-white text-gray-700 py-2 w-48 border rounded shadow-md z-10"> <!-- mt-0 menghilangkan gap -->
                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Peraturan Terkait</a>
                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Objek Sewa</a>
                        </div>
                    </div>

                    <button href="#" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-indigo-500 text-sm font-medium">
                        Syarat & Ketentuan
                    </button>

                    @auth
                        <!-- Jika sudah sign in, redirect ke halaman approval-list -->
                        <a href="{{ route('approval-list') }}" class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Upload Dokumen
                        </a>
                        <a href="{{ route('approval-list') }}" class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Cek Status Permohonan
                        </a>
                        <a href="{{ route('approval-list') }}" class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            E-Billing
                        </a>
                    @else
                        <!-- Jika belum sign in, tampilkan tombol yang memicu modal -->
                        <button class="openModal inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-indigo-500 text-sm font-medium">
                            Upload Dokumen
                        </button>
                        <button class="openModal inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-indigo-500 text-sm font-medium">
                            Cek Status Permohonan
                        </button>
                        <button class="openModal inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-indigo-500 text-sm font-medium">
                            E-Billing
                        </button>
                    @endauth

                    <a href="#" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-indigo-500 text-sm font-medium">
                        Survey Kepuasan Layanan
                    </a>

                    <a href="#" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-indigo-500 text-sm font-medium">
                        Customer Service
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content Section -->
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between mb-4">
                        <h2 class="text-2xl font-bold">User List</h2>
                        <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Add User</a>
                    </div>

                    <table id="userTable" class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2">asd</td>
                                <td class="border px-4 py-2">asd</td>
                                <td class="border px-4 py-2">asd</td>
                                <td class="border px-4 py-2">
                                    <a href="#" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Edit</a>
                                    <a href="#" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Background -->
    <div id="ktpModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden z-50">
        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-lg p-6 w-96">
            <h2 class="text-xl font-semibold mb-4">Login</h2>
            <form id="ktpForm" method="POST" action="{{ url('/login') }}">
                @csrf
                <div class="mb-4">
                    <label for="ktp" class="block text-sm font-medium text-gray-700">No KTP</label>
                    <input type="text" name="ktp" id="ktp" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">No Telp</label>
                    <input type="text" name="phone" id="phone" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
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
