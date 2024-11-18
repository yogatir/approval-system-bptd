@extends('layouts.app')

@section('content')
    <div class="relative overflow-hidden w-full h-12 bg-gray-200">
        <div class="absolute whitespace-nowrap animate-marquee">
            <span class="mx-4">SELAMAT DATANG DI SISTEM INFORMASI PNBP BPTD BALI</span>
        </div>
    </div>

    <div style="background-image: url('{{ asset('storage/app/home-bg.jpeg') }}');" class="bg-cover bg-center bg-no-repeat min-h-[calc(100vh-64px)] w-full z-10">
        <div class="relative p-6 rounded-lg shadow-lg text-center flex items-center justify-center min-h-[calc(100vh-64px)]">
            <img src="{{ asset('storage/app/home-logo.png') }}" class="absolute top-[80px]" alt="">
        </div>
    </div>

    <div class="relative w-full px-6 py-8 bg-white h-full shadow-md py-[120px] mt-8">
        <h2 class="text-2xl font-semibold text-center mb-4">Informasi Akses Pengguna</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gray-200 p-6 rounded-lg shadow-lg text-center">
                <h3 class="text-xl font-medium text-gray-700 mb-2">Total Pengguna</h3>
                <p class="text-3xl font-bold text-blue-600">391</p>
            </div>

            <div class="bg-gray-200 p-6 rounded-lg shadow-lg text-center">
                <h3 class="text-xl font-medium text-gray-700 mb-2">Pengguna Bulan Ini</h3>
                <p class="text-3xl font-bold text-green-600">12</p>
            </div>
        </div>
    </div>

    <div class="bg-gray-200 py-[120px]">
        <div class="container mx-auto px-4 py-8 bg-white shadow-sm px-10">
            <div class="text-center mb-8">
              <h1 class="text-2xl font-semibold text-gray-700">
                Survei Kepuasan Pelayanan Pelanggan
              </h1>
            </div>
    
            <div class="grid grid-cols-4 gap-4 mb-8">
              <div class="bg-green-100 text-center p-6 rounded-lg shadow">
                <p class="text-4xl font-bold text-green-600">7</p>
                <p class="text-lg font-medium text-gray-700">SANGAT PUAS</p>
                <!-- <button class="mt-4 px-4 py-2 bg-green-600 text-white rounded-lg">Pilih</button> -->
              </div>
              <div class="bg-blue-100 text-center p-6 rounded-lg shadow">
                <p class="text-4xl font-bold text-blue-600">13</p>
                <p class="text-lg font-medium text-gray-700">PUAS</p>
                <!-- <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg">Pilih</button> -->
              </div>
              <div class="bg-yellow-100 text-center p-6 rounded-lg shadow">
                <p class="text-4xl font-bold text-yellow-600">5</p>
                <p class="text-lg font-medium text-gray-700">KURANG PUAS</p>
                <!-- <button class="mt-4 px-4 py-2 bg-yellow-600 text-white rounded-lg">Pilih</button> -->
              </div>
              <div class="bg-red-100 text-center p-6 rounded-lg shadow">
                <p class="text-4xl font-bold text-red-600">1</p>
                <p class="text-lg font-medium text-gray-700">TIDAK PUAS</p>
                <!-- <button class="mt-4 px-4 py-2 bg-red-600 text-white rounded-lg">Pilih</button> -->
              </div>
            </div>
    
            <div>
              <div class="mb-4">
                <p class="text-gray-700 font-medium">Sangat Puas</p>
                <div class="w-full bg-gray-200 rounded-full h-4">
                  <div class="bg-green-500 h-4 rounded-full" style="width: 26.92%;"></div>
                </div>
              </div>
              <div class="mb-4">
                <p class="text-gray-700 font-medium">Puas</p>
                <div class="w-full bg-gray-200 rounded-full h-4">
                  <div class="bg-blue-500 h-4 rounded-full" style="width: 50%;"></div>
                </div>
              </div>
              <div class="mb-4">
                <p class="text-gray-700 font-medium">Kurang Puas</p>
                <div class="w-full bg-gray-200 rounded-full h-4">
                  <div class="bg-yellow-500 h-4 rounded-full" style="width: 19.23%;"></div>
                </div>
              </div>
              <div class="mb-4">
                <p class="text-gray-700 font-medium">Tidak Puas</p>
                <div class="w-full bg-gray-200 rounded-full h-4">
                  <div class="bg-red-500 h-4 rounded-full" style="width: 3.85%;"></div>
                </div>
              </div>
            </div>
        </div>
    </div>

    <div class="fixed bottom-4 right-4 w-48 h-72 shadow-lg z-10">
        <img src="{{ asset('storage/app/welcome.gif') }}" alt="Welcome" class="w-full h-full object-cover rounded">

        <button 
            id="toggle-audio" 
            class="absolute bottom-2 right-2 bg-blue-500 text-white px-4 py-2 rounded">
            <i id="audio-icon" class="fas fa-volume-up text-xl"></i>
        </button>
    </div>

    <footer class="bottom-0 w-full relative bg-gray-800 text-white text-center py-4">
        <p>&copy; 2024 PNBP BPTD Kelas II Bali</p>
    </footer>

    <audio id="background-audio" autoplay>
        <source src="{{ asset('storage/app/sip-voice.mp3') }}" type="audio/mpeg">
        Browser tidak support memutar audio.
    </audio>

    <script>
        const audio = document.getElementById('background-audio');
        const toggleButton = document.getElementById('toggle-audio');
        const audioIcon = document.getElementById('audio-icon');

        toggleButton.addEventListener('click', () => {
            audio.muted = !audio.muted;
            audioIcon.classList.toggle('fa-volume-mute', audio.muted);
            audioIcon.classList.toggle('fa-volume-up', !audio.muted);
        });
    </script>

    <script>
        if (!sessionStorage.getItem('highlighted')) {
            const highlightTimings = [
                { start: 21, end: 52, className: "informasi-layanan" },
                { start: 52, end: 111, className: "permohonan" },
                { start: 111, end: 127, className: "survey" },
                { start: 127, end: 140, className: "customer-service" }
            ];

            const audio = document.getElementById('background-audio');

            audio.addEventListener("timeupdate", () => {
                const currentTime = audio.currentTime;

                highlightTimings.forEach(({ start, end, className }) => {
                    const element = document.querySelector(`.${className}`);
                    if (element) {
                        if (currentTime >= start && currentTime < end) {
                            element.classList.add("highlight");
                            element.classList.add("rounded-xl");
                        } else {
                            element.classList.remove("highlight");
                            element.classList.remove("rounded-xl");
                        }
                    }
                });
            });

            sessionStorage.setItem('highlighted', 'true');
        }
    </script>

@endsection