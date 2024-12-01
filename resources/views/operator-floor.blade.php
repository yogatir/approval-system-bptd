@extends('layouts.operator-app')

@section('content')
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-center my-8">
                    <h1 class="text-2xl font-semibold text-gray-700">
                        Denah Terminal Mengwi
                    </h1>
                </div>

                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($floors->isEmpty())
                        <p class="text-gray-600">Denah Tidak Ada</p>
                    @else
                        <table class="min-w-full border-collapse border border-gray-300">
                            <tbody>
                                <tr>
                                    @foreach ($floors as $floor)
                                        <td 
                                            class="border px-4 py-2 text-center cursor-pointer {{ $floor->is_used === 1 ? 'bg-red-500 text-white' : 'bg-green-500 text-white' }}"
                                            x-data
                                            x-on:click="$dispatch('open-popup', { id: {{ $floor->id }}, userId: '{{ $floor->user_id }}', isUsed: {{ $floor->is_used }}, location: '{{ $floor->detail_location }}' })"
                                        >
                                            {{ $floor->detail_location }}
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Popup -->
    <div 
        x-data="{ open: false, id: null, userId: '', isUsed: false, location: '' }"
        x-on:open-popup.window="open = true; id = $event.detail.id; userId = $event.detail.userId; isUsed = $event.detail.isUsed, location = $event.detail.location"
        x-show="open"
        class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50"
        x-cloak
    >
        <div class="bg-white rounded-lg p-6 w-96 shadow-lg">
            <h2 class="text-lg font-bold mb-4 text-gray-700" x-text="'Denah | ' + location"></h2>
            <form method="POST" action="{{ route('operator-floor-update') }}">
                @csrf
                <input type="hidden" name="id" x-model="id">

                <div class="mb-4">
                    <label for="user-id" class="block text-gray-600">Pemohon</label>
                        <select 
                            name="user_id" 
                            id="user-id" 
                            x-model="userId"
                            class="w-full border border-gray-300 rounded px-3 py-2"
                        >
                        <option value="" disabled selected>Pilih Pemohon</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4 flex items-center">
                    <label for="is_used" class="block text-gray-600 mr-3">Ruangan aktif</label>
                    <div x-data="{ isUsed: {{ $floor->is_used ? 'true' : 'false' }} }">
                        <input 
                            type="hidden" 
                            name="is_used" 
                            :value="isUsed ? 1 : 0"
                        >
                        <input 
                            type="checkbox" 
                            id="is_used" 
                            x-model="isUsed" 
                            class="toggle-checkbox"
                        >
                    </div>
                </div>


                <div class="flex justify-end space-x-3">
                    <button type="button" x-on:click="open = false" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded">
                        Batal
                    </button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
