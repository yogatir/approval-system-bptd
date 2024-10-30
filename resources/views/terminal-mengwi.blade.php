@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 container mx-auto px-4 my-10 rounded py-8">
        <!-- Section Title and Subtitle -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold">Terminal Mengwi</h1>
            <p class="text-gray-500">BPTD Kelas II Bali</p>
        </div>

        <!-- Navigation Tabs -->
        <div class="flex justify-center mb-8">
            <button data-target="akdp" class="filter-btn px-4 py-2 bg-indigo-600 text-white rounded-full font-medium text-sm focus:outline-none">KIOS AKDP</button>
            <button data-target="akap" class="filter-btn ml-4 px-4 py-2 text-gray-700 font-medium text-sm hover:bg-gray-200 rounded-full focus:outline-none">KIOS AKAP</button>
            <button data-target="food-court" class="filter-btn ml-4 px-4 py-2 text-gray-700 font-medium text-sm hover:bg-gray-200 rounded-full focus:outline-none">KIOS FOOD COURT</button>
            <button data-target="booth-stand" class="filter-btn ml-4 px-4 py-2 text-gray-700 font-medium text-sm hover:bg-gray-200 rounded-full focus:outline-none">BOOTH STAND</button>
            <button data-target="wall-n-digital-space" class="filter-btn ml-4 px-4 py-2 text-gray-700 font-medium text-sm hover:bg-gray-200 rounded-full focus:outline-none">WALL AND DIGITAL SPACE</button>
            <button data-target="corridor-space" class="filter-btn ml-4 px-4 py-2 text-gray-700 font-medium text-sm hover:bg-gray-200 rounded-full focus:outline-none">KORIDOR SPACE</button>
            <button data-target="loket-space" class="filter-btn ml-4 px-4 py-2 text-gray-700 font-medium text-sm hover:bg-gray-200 rounded-full focus:outline-none">LOKET SPACE</button>
            <button data-target="lahan-kosong" class="filter-btn ml-4 px-4 py-2 text-gray-700 font-medium text-sm hover:bg-gray-200 rounded-full focus:outline-none">LAHAN KOSONG</button>
        </div>
        
        <!-- <div id="description-section" class="mb-8">
            <div id="akdp-description" class="description">
                <h2 class="text-2xl font-semibold mb-4">AKDP</h2>
                <p class="text-sm text-gray-700 mb-4">cocok bagi para calon mitra untuk dijadikan Kantor ( Unit Kerja )</p>
                <ul class="list-disc pl-5 text-sm text-gray-700">
                    <li>Ukuran : 3,5 m x 5 m</li>
                    <li>Fasilitas : Listrik, Ruangan Ber- AC</li>
                </ul>
                <p class="mt-4 text-lg font-bold text-gray-900">Nilai Sewa : Rp. 8.250.000 / Tahun</p>
            </div>
        </div> -->

        <div id="akdp" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="{{ asset('storage/app/kios-3-akdp.jpg') }}" alt="Kios 3">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Kios 3</h3>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="{{ asset('storage/app/kios-3-2-akdp.jpg') }}" alt="Kios 3">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Kios 3</h3>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="{{ asset('storage/app/kios-4-2-akdp.jpg') }}" alt="Kios 4">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Kios 4</h3>
                </div>
            </div>
        </div>

        <div id="akap" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 hidden">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="{{ asset('storage/app/kios-1-akap.jpg') }}" alt="Kios 1">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Kios 1</h3>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="{{ asset('storage/app/kios-4-akap.jpg') }}" alt="Kios 4">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Kios 4</h3>
                </div>
            </div>
        </div>

        <div id="food-court" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 hidden">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="{{ asset('storage/app/food-court-1.jpg') }}" alt="Food Court 1">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Kios 1</h3>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="{{ asset('storage/app/food-court-2.jpg') }}" alt="Food Court 2">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Food Court 2</h3>
                </div>
            </div>
        </div>

        <div id="booth-stand" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 hidden">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="{{ asset('storage/app/booth-stand-1.jpg') }}" alt="Booth Stand 1">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Booth Stand 1</h3>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="{{ asset('storage/app/booth-stand-2.jpg') }}" alt="Booth Stand 2">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Booth Stand 2</h3>
                </div>
            </div>
        </div>

        <div id="wall-n-digital-space" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 hidden">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="{{ asset('storage/app/wall-and-digital-space-1.jpg') }}" alt="Space 1">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Space 1</h3>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="{{ asset('storage/app/wall-and-digital-space-2.jpg') }}" alt="Space 2">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Space 2</h3>
                </div>
            </div>
        </div>

        <div id="loket-space" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 hidden">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="{{ asset('storage/app/loket-space-1.jpg') }}" alt="Loket Space 1">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Loket Space 1</h3>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="{{ asset('storage/app/loket-space-2.jpg') }}" alt="Loket Space 2">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Loket Space 2</h3>
                </div>
            </div>
        </div>

        <div id="lahan-kosong" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 hidden">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="{{ asset('storage/app/lahan-kosong-1.jpg') }}" alt="Lahan Kosong 1">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Lahan Kosong 1</h3>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="{{ asset('storage/app/lahan-kosong-2.jpg') }}" alt="Lahan Kosong 2">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Lahan Kosong 2</h3>
                </div>
            </div>
        </div>

        <div id="corridor-space" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 hidden">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="{{ asset('storage/app/koridor-space-1.jpg') }}" alt="Koridor Space 1">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Koridor Space 1</h3>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="{{ asset('storage/app/koridor-space-2.jpg') }}" alt="Lahan Kosong 2">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Koridor Space 2</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
