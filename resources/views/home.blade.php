@extends('layouts.app')

@section('content')
    <div class="relative overflow-hidden w-full h-12 bg-gray-200">
        <div class="absolute whitespace-nowrap animate-marquee">
            <span class="mx-4">SELAMAT DATANG DI SISTEM INFORMASI PNBP BPTD BALI</span>
        </div>
    </div>

    <div style="background-image: url('{{ asset('images/web/home-bg.jpeg') }}');" class="bg-cover bg-center bg-no-repeat min-h-[calc(100vh-64px)] w-full z-10">
        <div class="relative p-6 rounded-lg shadow-lg text-center flex items-center justify-center min-h-[calc(100vh-64px)]">
            <img src="{{ asset('images/web/home-logo.png') }}" class="absolute top-[80px]" alt="">
        </div>
    </div>

    <div class="relative w-full px-6 py-8 bg-white h-full shadow-md py-[120px] mt-8">
        <h2 class="text-2xl font-semibold text-center mb-4">Informasi Akses Pengguna</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gray-200 p-6 rounded-lg shadow-lg text-center">
                <h3 class="text-xl font-medium text-gray-700 mb-2">Total Pengguna</h3>
                <p class="text-3xl font-bold text-blue-600">{{ $totalVisits }}</p>
            </div>

            <div class="bg-gray-200 p-6 rounded-lg shadow-lg text-center">
                <h3 class="text-xl font-medium text-gray-700 mb-2">Pengguna Bulan Ini</h3>
                <p class="text-3xl font-bold text-green-600">{{ $thisMonthVisits }}</p>
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

          <div class="grid grid-cols-5 gap-4 mb-8">
              @foreach ($counts as $level => $count)
                  @php
                      $color = match($level) {
                          'VERY_GOOD' => 'green',
                          'GOOD' => 'blue',
                          'NORMAL' => 'yellow',
                          'BAD' => 'red',
                          default => 'gray',
                      };
                  @endphp
                  <div class="bg-{{ $color }}-100 text-center p-6 rounded-lg shadow">
                      <p class="text-4xl font-bold text-{{ $color }}-600">{{ $count }}</p>
                      <p class="text-lg font-medium text-gray-700">{{ $satisfactionLevels[$level] }}</p>
                  </div>
              @endforeach
          </div>

          <div>
              @foreach ($percentages as $level => $percentage)
                  @php
                      $color = match($level) {
                          'VERY_GOOD' => 'green',
                          'GOOD' => 'blue',
                          'NORMAL' => 'yellow',
                          'BAD' => 'red',
                          default => 'gray',
                      };
                  @endphp
                  <div class="mb-4">
                      <p class="text-gray-700 font-medium">{{ $satisfactionLevels[$level] }}</p>
                      <div class="w-full bg-gray-200 rounded-full h-4">
                          <div class="bg-{{ $color }}-500 h-4 rounded-full" style="width: {{ round($percentage, 2) }}%;"></div>
                      </div>
                  </div>
              @endforeach
          </div>
      </div>
    </div>


    <div id="minsip-bottom-right" class="fixed bottom-4 right-4 w-48 h-72 shadow-lg z-10 hidden">
        <a href="https://wa.me/+6281330889375" target="_blank" class="absolute bottom-2 left-[-4rem] bg-green-500 text-white px-4 py-2 rounded">
            <i class="fab fa-whatsapp text-xl"></i>
        </a>

        <img src="{{ asset('images/web/welcome.gif') }}" alt="Welcome" class="w-full h-full object-cover rounded">

        <button 
            id="toggle-audio" 
            class="absolute bottom-2 right-2 bg-blue-500 text-white px-4 py-2 rounded hidden">
            <i id="audio-icon" class="fas fa-volume-up text-xl"></i>
        </button>
    </div>

    <footer class="bottom-0 w-full relative bg-gray-800 text-white text-center py-4">
        <p>&copy; 2024 PNBP BPTD Kelas II Bali</p>
    </footer>

    <div id="help-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-80">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg flex relative">
            <button id="close-modal" class="absolute top-4 right-4 text-gray-600 hover:text-gray-800 text-xl font-bold">
                &times;
            </button>

            <div class="flex-shrink-0">
                <img src="{{ asset('images/web/welcome.gif') }}" alt="Help Illustration" class="w-52 h-auto rounded-l-lg">
            </div>

            <div class="p-6 flex-1 flex flex-col justify-between">
                <div class="pt-10">
                    <h2 class="text-lg font-bold text-gray-800">Hallo!</h2>
                    <p class="text-gray-600 mt-2">Butuh Bantuan Minsip?</p>
                    <a href="https://wa.me/+6281330889375" id="whatsapp-pop-up" target="_blank" class="bg-green-500 w-32 mt-5 text-white flex items-center px-3 py-2 rounded-lg hover:bg-green-600">
                        <i class="fab fa-whatsapp mr-2"></i> WhatsApp
                    </a>
                </div>
                <div class="flex justify-start mt-4 space-x-2">

                    <button id="help-yes" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Ya
                    </button>

                    <button id="help-no" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">
                        Tidak
                    </button>
                </div>
            </div>
        </div>
    </div>

    <audio id="background-audio">
        <source src="{{ asset('images/web/sip-voice.mp3') }}" type="audio/mpeg">
        Browser tidak support memutar audio.
    </audio>

    <script>
        const minsip = document.getElementById('minsip-bottom-right')
        const helpModal = document.getElementById("help-modal");
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
        document.getElementById('whatsapp-pop-up').addEventListener('click', () => {
            helpModal.classList.add("hidden");
            minsip.classList.remove("hidden");
        });

        document.getElementById('close-modal').addEventListener('click', () => {
            helpModal.classList.add("hidden");
            minsip.classList.remove("hidden");
        });

        document.getElementById('help-no').addEventListener('click', () => {
            helpModal.classList.add("hidden");
            minsip.classList.remove("hidden");
        });

        document.getElementById('help-yes').addEventListener('click', () => {
            helpModal.classList.add("hidden");
            minsip.classList.remove("hidden");
            toggleButton.classList.remove("hidden");

            playAudioWithDelay();
        });
    </script>

    <script>
      function playAudioWithDelay() {
        audio.play();
      };
    </script>

    <script>
      const highlightTimings = [
          { start: 21, end: 52, className: "informasi-layanan" },
          { start: 52, end: 111, className: "permohonan" },
          { start: 111, end: 127, className: "survey" },
          { start: 127, end: 140, className: "customer-service" }
      ];

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
    </script>

@endsection