@extends('layouts.app')

@section('content')
    <nav class="flex mt-14 mb-3" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('arsip.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M3 6a2 2 0 0 1 2-2h5.532a2 2 0 0 1 1.536.72l1.9 2.28H3V6Zm0 3v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9H3Z"
                            clip-rule="evenodd" />
                    </svg>
                    Arsip
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-700 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{ route('arsip.show', $arsip) }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">Lihat Arsip</a>
                </div>
            </li>
        </ol>
    </nav>
    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
        <h2 class="text-lg font-semibold">Lihat Arsip Surat</h2>
        <div class="mt-4">
            <h3 class="text-md font-semibold">Detail Arsip:</h3>
            <ul class="list-disc list-inside">
                <li><strong>No. Surat:</strong> {{ $arsip->no_surat }}</li>
                <li><strong>Judul Surat:</strong> {{ $arsip->judul_surat }}</li>
                <li><strong>Kategori:</strong> {{ $arsip->kategori->nama_kategori }}</li>
                <li><strong>Waktu Unggah:</strong> {{ $arsip->waktu_upload }}</li>
            </ul>
        </div>

        <div class="mt-6">
            <h3 class="text-md font-semibold mb-2">Preview Surat:</h3>
            <iframe src="{{ asset('storage/arsip/' . $arsip->file_surat) }}?v={{ time() }}"
                class="w-full h-[500px] border rounded-lg shadow-sm">
            </iframe>
        </div>

        <div class="mt-4 max-w-md">
            <form action="{{ route('arsip.updateFile', $arsip) }}" method="POST" enctype="multipart/form-data"
                class="flex items-center gap-3">
                @csrf
                @method('PUT')

                <input type="file" name="file_surat" accept="application/pdf" required
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">

                <button type="submit"
                    class="px-4 py-2 text-sm text-nowrap font-medium text-white bg-yellow-500 rounded-lg border border-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300">
                    Ganti File
                </button>
            </form>
        </div>

        <div class="flex justify-start gap-3 mt-4">
            <a href="{{ route('arsip.index') }}"
                class="flex items-center justify-center px-5 py-2.5 text-sm font-medium text-gray-900 bg-gray-300 rounded-lg hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-200">
                &laquo; Kembali
            </a>
            <a href="{{ route('arsip.download', $arsip) }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Unduh Surat
            </a>
        </div>
    </div>
@endsection
