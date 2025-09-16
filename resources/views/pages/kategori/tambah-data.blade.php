@extends('layouts.app')

@section('content')
    <nav class="flex mt-14 mb-3" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('kategori.index') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-6 8a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1 3a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z"
                            clip-rule="evenodd" />
                    </svg>
                    Kategori Surat
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-700 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{ route('kategori.create') }}"
                        class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">Tambah
                        Data</a>
                </div>
            </li>
        </ol>
    </nav>
    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
        <h2 class="text-lg font-semibold">Tambah Kategori Surat</h2>
        <p class="mt-2 text-sm text-gray-600">Tambahkan data kategori surat. Jika sudah selesai, klik tombol "Simpan".</p>
        
        @if ($errors->any())
            <div id="alert-error" class="my-4 p-4 text-sm text-red-700 bg-red-100 rounded-lg border border-red-300"
                role="alert">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            <script>
                setTimeout(() => {
                    const alertBox = document.getElementById('alert-error');
                    if (alertBox) {
                        alertBox.style.transition = "opacity 0.5s ease";
                        alertBox.style.opacity = "0";
                        setTimeout(() => alertBox.remove(), 500);
                    }
                }, 5000);
            </script>
        @endif
        <form class="space-y-4" action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <label for="nama_kategori" class="md:col-span-1 flex items-center text-sm font-medium text-gray-900">
                    Nama Kategori
                </label>
                <div class="md:col-span-3">
                    <input type="text" id="nama_kategori" name="nama_kategori"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5"
                        placeholder="Masukkan nama kategori...." required />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <label for="keterangan" class="md:col-span-1 flex items-center text-sm font-medium text-gray-900">
                    Keterangan
                </label>
                <div class="md:col-span-3">
                    <textarea rows="4" id="keterangan" name="keterangan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5"
                        placeholder="Masukkan keterangan...." required></textarea>
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('kategori.index') }}"
                    class="flex items-center justify-center px-5 py-2.5 text-sm font-medium text-gray-900 bg-gray-300 rounded-lg hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-200">
                    &laquo; Kembali
                </a>
                <button type="submit"
                    class="flex items-center justify-center px-5 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Simpan
                </button>
            </div>
        </form>
    </div>

@endsection
