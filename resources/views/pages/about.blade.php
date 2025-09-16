@extends('layouts.app')

@section('content')
    <nav class="flex mt-14 mb-3" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('about') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                            clip-rule="evenodd" />
                    </svg>
                    About
                </a>
            </li>
        </ol>
    </nav>
    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
        <h2 class="text-lg font-semibold">About</h2>
        <div class="flex items-start gap-6 mt-2">
            <img src="{{ asset('assets/images/2141720182.jpg') }}" alt="Foto Profil"
                class="w-32 h-40 rounded-lg object-cover object-top border">

            <div class="space-y-2">
                <h3 class="text-lg font-semibold text-gray-800">Aplikasi ini dibuat oleh:</h3>
                <div class="grid grid-cols-6 max-w-md gap-2 text-sm text-gray-600">
                    <div class="font-medium">Nama</div>
                    <div class="text-center">:</div>
                    <div class="col-span-4">Muhammad Aqilul Muttaqin</div>

                    <div class="font-medium">Prodi</div>
                    <div class="text-center">:</div>
                    <div class="col-span-4">D4 Teknik Informatika</div>

                    <div class="font-medium">NIM</div>
                    <div class="text-center">:</div>
                    <div class="col-span-4">2141720182</div>

                    <div class="font-medium">Tanggal</div>
                    <div class="text-center">:</div>
                    <div class="col-span-4">16 September 2025</div>
                </div>
            </div>

        </div>
    </div>
@endsection
