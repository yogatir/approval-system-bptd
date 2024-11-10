@extends('layouts.app')

@section('content')
    <div id="confirmationModal" class="fixed inset-0 hidden bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <h2 class="text-xl font-bold mb-4">Apa anda yakin?</h2>
            <p class="text-gray-700 mb-6">Simpan data permohonan?</p>

            <div class="flex justify-center space-x-4">
                <button type="button" onclick="submitForm()" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Ya</button>
                <button type="button" onclick="closeConfirmationModal()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">Tidak</button>
            </div>
        </div>
    </div>

    <div id="cancelModal" class="fixed inset-0 hidden bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <h2 class="text-xl font-bold mb-4">Apa anda yakin?</h2>
            <p class="text-gray-700 mb-6">Batalkan permohonan?</p>

            <div class="flex justify-center space-x-4">
                <a href="{{ route('approval-list') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Ya</a>
                <button type="button" onclick="closeCancelModal()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">Tidak</button>
            </div>
        </div>
    </div>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-6">Formulir Pemohon</h2>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form if="approvalForm" action="{{ route('submit-add-approval') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @php $isRegistered = isset($user); @endphp

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="id_card_no" class="block text-sm font-medium text-gray-700">No KTP</label>
                                <input type="text" name="id_card_no" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Masukan No KTP" value="{{ $user->id_card_no ?? session('id_card_no') }}" {{ $isRegistered ? 'readonly' : '' }} required>
                            </div>
    
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" name="name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Masukan Nama" value="{{ $user->name ?? old('name') }}" {{ $isRegistered ? 'readonly' : '' }} required>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Masukan Email" value="{{ $user->email ?? old('email') }}" {{ $isRegistered ? 'readonly' : '' }} required>
                            </div>
    
                            <div class="mb-4">
                                <label for="phone" class="block text-sm font-medium text-gray-700">No Telepon</label>
                                <input type="text" name="phone" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Masukan No Telepon" value="{{ $user->phone ?? session('phone') }}" {{ $isRegistered ? 'readonly' : '' }} required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                                <select name="gender" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm bg-white" {{ $isRegistered ? 'readonly' : '' }} required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="MALE" {{ old('gender') == 'MALE' || ($isRegistered && $user->gender == 'MALE') ? 'selected' : '' }}>Laki - Laki</option>
                                    <option value="FEMALE" {{ old('gender') == 'FEMALE' || ($isRegistered && $user->gender == 'FEMALE') ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
    
                            <div class="mb-4">
                                <label for="request_type" class="block text-sm font-medium text-gray-700">Jenis Permohonan</label>
                                <select name="request_type" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm bg-white">
                                    <option value="">-- Pilih Jenis Permohonan --</option>
                                    <option value="Pinjam Pakai">Pinjam Pakai</option>
                                    <option value="Sewa">Sewa</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                                <input type="text" name="address" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Masukan Alamat" value="{{ $user->address ?? old('address') }}" {{ $isRegistered ? 'readonly' : '' }} required>
                            </div>

                            <div class="mb-4">
                                <label for="location_id" class="block text-sm font-medium text-gray-700">Lokasi</label>
                                <select name="location_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm bg-white">
                                    <option value="">-- Pilih Lokasi --</option>
                                    @foreach($locations as $location)
                                        <option value="{{ $location['id'] }}">{{ $location['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="file_id_card" class="block text-sm font-medium text-gray-700">Scan / Fotokopi KTP</label>
                                <input type="file" name="file_id_card" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" accept=".pdf">
                                @error('file')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="file_npwp" class="block text-sm font-medium text-gray-700">Scan / Fotokopi NPWP</label>
                                <input type="file" name="file_npwp" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" accept=".pdf">
                                @error('file')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="file_document_request" class="block text-sm font-medium text-gray-700">Surat Permohonan Sewa</label>
                                <input type="file" name="file_document_request" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"accept=".pdf">
                                @error('file')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="file_agreement" class="block text-sm font-medium text-gray-700">Surat Pernyataan Kesediaan Menjaga Objek Sewa</label>
                                <input type="file" name="file_agreement" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"accept=".pdf">
                                @error('file')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="file_permit" class="block text-sm font-medium text-gray-700">Scan / Fotokopi Surat Ijin Usaha</label>
                                <input type="file" name="file_permit" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"accept=".pdf">
                                @error('file')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="detail_location" class="block text-sm font-medium text-gray-700">Objek Sewa / Lokasi</label>
                                <select name="detail_location" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm bg-white">
                                    <option value="">-- Pilih Lokasi --</option>
                                    <option value="" disabled>Food Court</option>
                                    <option value="FC1">FC 1</option>
                                    <option value="FC2">FC 2</option>
                                    <option value="FC3">FC 3</option>
                                    <option value="FC4">FC 4</option>
                                    <option value="FC5">FC 5</option>
                                    <option value="FC6">FC 6</option>
                                    <option value="FC7">FC 7</option>
                                    <option value="FC8">FC 8</option>
                                    <option value="" disabled>AKAP</option>
                                    <option value="A1">A 1</option>
                                    <option value="A2">A 2</option>
                                    <option value="A3">A 3</option>
                                    <option value="A4">A 4</option>
                                    <option value="A5">A 5</option>
                                    <option value="A6">A 6</option>
                                    <option value="A7">A 7</option>
                                    <option value="A8">A 8</option>
                                    <option value="" disabled>AKDP</option>
                                    <option value="D1">D 1</option>
                                    <option value="D2">D 2</option>
                                    <option value="D3">D 3</option>
                                    <option value="D4">D 4</option>
                                    <option value="D5">D 5</option>
                                </select>
                            </div>
                        </div>                        

                        <div class="flex justify-end">
                            <button onclick="openCancelModal()" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 mr-2">Batal</button>
                            <button onclick="openConfirmationModal()" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openConfirmationModal() {
            document.getElementById('confirmationModal').classList.remove('hidden');
        }

        function closeConfirmationModal() {
            document.getElementById('confirmationModal').classList.add('hidden');
        }

        function submitForm() {
            document.getElementById('approvalForm').submit();
        }

        function openCancelModal() {
            document.getElementById('cancelModal').classList.remove('hidden');
        }

        function closeCancelModal() {
            document.getElementById('cancelModal').classList.add('hidden');
        }
    </script>
@endsection
