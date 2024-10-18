@extends('layouts.app')

@section('content')
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-6">User Form</h2>

                    <form action="{{ route('submit-add-approval') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @php $isRegistered = isset($user); @endphp

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="id_card_no" class="block text-sm font-medium text-gray-700">No KTP</label>
                                <input type="text" name="id_card_no" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Masukan No KTP" value="{{ $user->id_card_no ?? session('id_card_no') }}" {{ $isRegistered ? 'disabled' : '' }} required>
                            </div>
    
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" name="name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Masukan Nama" value="{{ $user->name ?? old('name') }}" {{ $isRegistered ? 'disabled' : '' }} required>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Masukan Email" value="{{ $user->email ?? old('email') }}" {{ $isRegistered ? 'disabled' : '' }} required>
                            </div>
    
                            <div class="mb-4">
                                <label for="instance" class="block text-sm font-medium text-gray-700">Instansi</label>
                                <input type="text" name="instance" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Masukan Instansi" value="{{ $user->instance ?? old('instance') }}" {{ $isRegistered ? 'disabled' : '' }} required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                                <select name="gender" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm bg-white" {{ $isRegistered ? 'disabled' : '' }} required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="MALE" {{ old('gender') == 'MALE' || ($isRegistered && $user->gender == 'MALE') ? 'selected' : '' }}>Laki - Laki</option>
                                    <option value="FEMALE" {{ old('gender') == 'FEMALE' || ($isRegistered && $user->gender == 'FEMALE') ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
    
                            <div class="mb-4">
                                <label for="phone" class="block text-sm font-medium text-gray-700">No Telepon</label>
                                <input type="text" name="phone" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Masukan No Telepon" value="{{ $user->phone ?? session('phone') }}" {{ $isRegistered ? 'disabled' : '' }} required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                                <input type="text" name="address" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Masukan Alamat" value="{{ $user->address ?? old('address') }}" {{ $isRegistered ? 'disabled' : '' }} required>
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
                                <label for="file_agreement" class="block text-sm font-medium text-gray-700">Surat Pernyataan Kesediaan Menjaga Objek Wisata</label>
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
                                <label for="file_image" class="block text-sm font-medium text-gray-700">Foto Object / Lokasi yang akan Disewa</label>
                                <input type="file" name="file_image" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"accept="image/*">
                                @error('file')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>                        

                        <div class="flex justify-end">
                            <a href="#" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 mr-2">Cancel</a>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
