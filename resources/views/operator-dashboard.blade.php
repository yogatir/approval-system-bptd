@extends('layouts.operator-app')

@section('content')
    <div class="py-10">
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
@endsection
