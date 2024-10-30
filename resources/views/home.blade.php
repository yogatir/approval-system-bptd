@extends('layouts.app')

@section('content')
    <div class="relative overflow-hidden w-full h-12 bg-gray-200">
        <div class="absolute whitespace-nowrap animate-marquee">
            <span class="mx-4">SELAMAT DATANG DI SISTEM INFORMASI PNBP BPTD BALI</span>
        </div>
    </div>

    <div style="background-image: url('{{ asset('storage/app/home-bg.jpeg') }}');" class="bg-cover bg-center bg-no-repeat min-h-[calc(100vh-64px)] w-full">
        <div class="p-6 rounded-lg shadow-lg text-center flex items-center justify-center min-h-[calc(100vh-64px)]">
            <img src="{{ asset('storage/app/home-logo.png') }}" alt="">
        </div>
    </div>
@endsection
