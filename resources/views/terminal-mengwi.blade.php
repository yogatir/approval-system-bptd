@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Section Title and Subtitle -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold">Terminal Mengwi</h1>
            <p class="text-gray-500">BPTD Kelas II Bali</p>
        </div>

        <!-- Navigation Tabs -->
        <div class="flex justify-center mb-8">
            <button class="px-4 py-2 bg-indigo-600 text-white rounded-full font-medium text-sm focus:outline-none">KIOS AKAP</button>
            <button class="ml-4 px-4 py-2 text-gray-700 font-medium text-sm hover:bg-gray-200 rounded-full focus:outline-none">KIOS AKDP</button>
            <button class="ml-4 px-4 py-2 text-gray-700 font-medium text-sm hover:bg-gray-200 rounded-full focus:outline-none">KIOS FOOD COURT</button>
            <button class="ml-4 px-4 py-2 text-gray-700 font-medium text-sm hover:bg-gray-200 rounded-full focus:outline-none">BOOTH STAND</button>
            <button class="ml-4 px-4 py-2 text-gray-700 font-medium text-sm hover:bg-gray-200 rounded-full focus:outline-none">WALL AND DIGITAL SPACE</button>
            <button class="ml-4 px-4 py-2 text-gray-700 font-medium text-sm hover:bg-gray-200 rounded-full focus:outline-none">KORIDOR SPACE</button>
            <button class="ml-4 px-4 py-2 text-gray-700 font-medium text-sm hover:bg-gray-200 rounded-full focus:outline-none">LOKET SPACE</button>
            <button class="ml-4 px-4 py-2 text-gray-700 font-medium text-sm hover:bg-gray-200 rounded-full focus:outline-none">LAHAN KOSONG</button>
        </div>

        <!-- Card Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="path-to-image.jpg" alt="UPPKB Cekik">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">UPPKB Cekik</h3>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="path-to-image.jpg" alt="UPPKB Seririt">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">UPPKB Seririt</h3>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="path-to-image.jpg" alt="Pelabuhan Padangbai">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Pelabuhan Penyebrangan Padangbai</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
