@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 container mx-auto px-4 my-10 rounded py-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold">Pelabuhan Sampalan</h1>
            <p class="text-gray-500">BPTD Kelas II Bali</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-4">
                    <h3 class="text-2xl mb-2 font-bold text-center">Objek Sewa Sampalan</h3>
                    <div class="p-6 bg-white">
                    </div>
                    <p class="text-md font-semibold">Obje Sewa Sampalan, Permohonan Sewa / Lokasi Sewa.</p>
                    <ol>
                        <li>Nilai Sewa : Rp. 1.500.000 / m2</li>
                    </ol>
                </div>
                <div class="relative slider-container">
                    <div class="slider-wrapper flex transition-transform duration-500" style="width: 200%">
                        <img class="w-full h-72 object-cover" src="{{ asset('images/web/image-sampalan-1.jpeg') }}">
                        <img class="w-full h-72 object-cover" src="{{ asset('images/web/image-sampalan-2.jpeg') }}">
                        <img class="w-full h-72 object-cover" src="{{ asset('images/web/image-sampalan-3.jpeg') }}">
                        <img class="w-full h-72 object-cover" src="{{ asset('images/web/image-sampalan-4.jpeg') }}">
                        <img class="w-full h-72 object-cover" src="{{ asset('images/web/image-sampalan-5.jpeg') }}">
                        <img class="w-full h-72 object-cover" src="{{ asset('images/web/image-sampalan-6.jpeg') }}">
                        <img class="w-full h-72 object-cover" src="{{ asset('images/web/image-sampalan-7.jpeg') }}">
                        <img class="w-full h-72 object-cover" src="{{ asset('images/web/image-sampalan-8.jpeg') }}">
                        <img class="w-full h-72 object-cover" src="{{ asset('images/web/image-sampalan-9.jpeg') }}">
                        <img class="w-full h-72 object-cover" src="{{ asset('images/web/image-sampalan-10.jpeg') }}">
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
