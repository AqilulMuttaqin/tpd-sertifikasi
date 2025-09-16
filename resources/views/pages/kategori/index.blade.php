@extends('layouts.app')

@section('content')
    {{-- Breadcrumb --}}
    <nav class="flex mt-14 mb-3" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('arsip.index') }}"
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
        </ol>
    </nav>

    {{-- Main Content --}}
    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
        <h2 class="text-lg font-semibold">Kategori Surat</h2>
        <p class="mt-2 text-sm text-gray-600">Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat. Klik
            "Tambah" untuk menambahkan kategori baru</p>

        {{-- Notifikasi --}}
        @if (session('success'))
            <div id="alert-success" class="my-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg border border-green-300"
                role="alert">
                {{ session('success') }}
            </div>

            <script>
                setTimeout(() => {
                    const alertBox = document.getElementById('alert-success');
                    if (alertBox) {
                        alertBox.style.transition = "opacity 0.5s ease";
                        alertBox.style.opacity = "0";
                        setTimeout(() => alertBox.remove(), 500);
                    }
                }, 3000);
            </script>
        @endif

        {{-- Tabel Kategori --}}
        <form action="{{ route('kategori.index') }}" method="GET" class="flex items-center max-w-lg mt-6">
            <label for="search" class="block text-sm font-medium text-gray-900 me-3 text-nowrap">Cari Kategori:</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="search" name="search" value="{{ request('search') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                    placeholder="Cari berdasarkan kategori...">
            </div>
            <button type="submit"
                class="px-5 py-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                Cari
            </button>
        </form>
        <div class="relative overflow-x-auto mt-3">
            <table class="w-full text-sm border border-gray-100 rounded-lg text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ID Kategori
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Kategori
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Keterangan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategori as $item)
                        <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 text-nowrap">
                                {{ $item->id }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->nama_kategori }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->keterangan }}
                            </td>
                            <td class="px-6 py-4 flex items-center gap-2">
                                <button type="button" onclick="confirmDelete({{ $item->id }})"
                                    class="px-2 py-1 text-xs font-medium text-white bg-red-700 rounded-lg border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300">
                                    Hapus
                                </button>
                                <form id="delete-form-{{ $item->id }}"
                                    action="{{ route('kategori.destroy', $item->id) }}" method="POST" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a href="{{ route('kategori.show', $item->id) }}"
                                    class="inline-block px-2 py-1 text-xs font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center">
                                Tidak ada data
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="flex justify-start mt-3">
            <a href="{{ route('kategori.create') }}"
                class="flex items-center justify-center px-5 py-2.5 text-sm font-medium text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">
                Tambah Kategori Baru
            </a>
        </div>

    </div>

    {{-- Script konfirmasi hapus --}}
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data arsip ini akan dihapus permanen.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
@endsection
