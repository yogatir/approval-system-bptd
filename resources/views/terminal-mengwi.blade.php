@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 container mx-auto px-4 my-10 rounded py-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold">Terminal Mengwi</h1>
            <p class="text-gray-500">BPTD Kelas II Bali</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-4">
                    <h3 class="text-2xl mb-2 font-bold text-center">AKDP</h3>
                    <div class="p-6 bg-white">
                        @if ($akdp->isEmpty())
                            <p class="text-gray-600">Denah Tidak Ada</p>
                        @else
                            <table class="min-w-full border-collapse border border-gray-300">
                                <tbody>
                                    <tr>
                                        @foreach ($akdp as $d)
                                            <td class="border text-2xl px-4 py-2 text-center {{ $d->is_used === 1 ? 'bg-red-500 text-white' : 'bg-green-500 text-white' }}">
                                                {{ $d->detail_location }}
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <p class="text-md font-semibold">Lokasi strategis bagi calon mitra untuk dijadikan kantor ( Unit Kerja ).</p>
                    <ol>
                        <li>Ukuran   : 3,5 m x 5 m</li>
                        <li>Fasilitas : Listrik, dan AC</li>
                        <li>Nilai Sewa : Rp. 8.250.000 / Tahun</li>
                    </ol>
                </div>
                <div class="relative slider-container">
                    <div class="slider-wrapper flex transition-transform duration-500" style="width: 200%">
                        <img class="w-full h-72 object-cover" src="{{ asset('images/web/kios-4-2-akdp.jpg') }}" alt="AKDP 3 2">
                        <img class="w-full h-72 object-cover" src="{{ asset('images/web/kios-4-akdp.jpg') }}" alt="AKDP 4">
                    </div>
                    <button class="slider-prev absolute top-1/2 left-2 transform -translate-y-1/2 bg-gray-800 text-white rounded-full p-2">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="slider-next absolute top-1/2 right-2 transform -translate-y-1/2 bg-gray-800 text-white rounded-full p-2">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-4">
                    <h3 class="text-2xl mb-2 font-bold text-center">AKAP</h3>
                    <div class="p-6 bg-white">
                        @if ($akap->isEmpty())
                            <p class="text-gray-600">Denah Tidak Ada</p>
                        @else
                            <table class="min-w-full border-collapse border border-gray-300">
                                <tbody>
                                    <tr>
                                        @foreach ($akap as $a)
                                            <td class="border text-xs px-4 py-2 text-center {{ $a->is_used === 1 ? 'bg-red-500 text-white' : 'bg-green-500 text-white' }}">
                                                {{ $a->detail_location }}
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <p class="text-md font-semibold">Lokasi strategis bagi calon mitra untuk menjual oleh-oleh khas bali, seperti pakaian, jajanan, produk unik lainnya.</p>
                    <ol>
                        <li>Ukuran   : 3,5 m x 5 m</li>
                        <li>Fasilitas : Listrik, AC, Suasana Nyaman Dan Tenang</li>
                        <li>Nilai Sewa : Rp. 8.250.000 / Tahun</li>
                    </ol>
                </div>
                <div class="relative slider-container">
                    <div class="slider-wrapper flex transition-transform duration-500" style="width: 200%">
                        <img class="w-full h-72 object-cover" src="{{ asset('images/web/kios-1-akap.jpg') }}" alt="AKAP 1">
                        <img class="w-full h-72 object-cover" src="{{ asset('images/web/kios-3-akap.jpg') }}" alt="AKAP 3">
                    </div>
                    <button class="slider-prev absolute top-1/2 left-2 transform -translate-y-1/2 bg-gray-800 text-white rounded-full p-2">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="slider-next absolute top-1/2 right-2 transform -translate-y-1/2 bg-gray-800 text-white rounded-full p-2">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-4">
                    <h3 class="text-2xl mb-2 font-bold text-center">FOOD COURT</h3>
                    <div class="p-6 bg-white">
                        @if ($foodCourt->isEmpty())
                            <p class="text-gray-600">Denah Tidak Ada</p>
                        @else
                            <table class="min-w-full border-collapse border border-gray-300">
                                <tbody>
                                    <tr>
                                        @foreach ($foodCourt as $fc)
                                            <td class="border text-xs px-4 py-2 text-center {{ $fc->is_used === 1 ? 'bg-red-500 text-white' : 'bg-green-500 text-white' }}">
                                                {{ $fc->detail_location }}
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <p class="text-md font-semibold">Lokasi strategis bagi calon mitra untuk usaha bisnis makanan dan minuman.</p>
                    <ol>
                        <li>Ukuran   : 3,5 m x 4.5 m</li>
                        <li>Fasilitas : Listrik, Air, Meja dan kursi</li>
                        <li>Nilai Sewa : Rp. 8.000.000/ Tahun</li>
                    </ol>
                </div>
                <div class="relative slider-container">
                    <div class="slider-wrapper flex transition-transform duration-500" style="width: 200%">
                        <img class="w-full h-72 object-cover" src="{{ asset('images/web/food-court-1.jpg') }}" alt="Food Court 1">
                        <img class="w-full h-72 object-cover" src="{{ asset('images/web/food-court-2.jpg') }}" alt="Food Court 2">
                    </div>
                    <button class="slider-prev absolute top-1/2 left-2 transform -translate-y-1/2 bg-gray-800 text-white rounded-full p-2">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="slider-next absolute top-1/2 right-2 transform -translate-y-1/2 bg-gray-800 text-white rounded-full p-2">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.slider-container').forEach((container) => {
            const slider = container.querySelector('.slider-wrapper');
            const next = container.querySelector('.slider-next');
            const prev = container.querySelector('.slider-prev');
            const totalSlides = slider.children.length;
            const slideWidth = 100 / totalSlides;
            let currentIndex = 0;

            next.addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % totalSlides;
                slider.style.transform = `translateX(-${currentIndex * slideWidth}%)`;
            });

            prev.addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                slider.style.transform = `translateX(-${currentIndex * slideWidth}%)`;
            });
        });
    </script>
@endsection
