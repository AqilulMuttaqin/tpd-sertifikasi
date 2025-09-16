@extends('layouts.app')

@section('content')
    <nav class="flex mt-14 mb-3" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('arsip.index') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
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
                    <a href="{{ route('arsip.create') }}"
                        class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">Unggah
                        Surat</a>
                </div>
            </li>
        </ol>
    </nav>
    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
        <h2 class="text-lg font-semibold">Unggah Surat</h2>
        <p class="mt-2 text-sm text-gray-600">Unggah surat yang telah terbit pada form ini untuk diarsipkan.</p>
        <div class="bg-blue-50 p-4 rounded-lg mt-2 mb-4">
            <p class="text-sm font-medium text-blue-800">Catatan:</p>
            <ul class="list-disc list-inside mt-1">
                <li class="text-sm text-blue-700">Gunakan file berformat PDF</li>
            </ul>
        </div>
        
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
        <form class="space-y-4" action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <label for="no_surat" class="md:col-span-1 flex items-center text-sm font-medium text-gray-900">
                    Nomor Surat
                </label>
                <div class="md:col-span-3">
                    <input type="text" id="no_surat" name="no_surat"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5"
                        placeholder="Masukkan no surat...." required />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <label for="kategori" class="md:col-span-1 flex items-center text-sm font-medium text-gray-900">
                    Kategori
                </label>
                <div class="md:col-span-3">
                    <select id="kategori_id" name="kategori_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                   focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5"
                        required>
                        <option value="" disabled selected>Pilih kategori...</option>
                        @foreach ($kategori as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <label for="judul_surat" class="md:col-span-1 flex items-center text-sm font-medium text-gray-900">
                    Judul
                </label>
                <div class="md:col-span-3">
                    <input type="text" id="judul_surat" name="judul_surat"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5"
                        placeholder="Masukkan judul...." required />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <label for="file_surat" class="md:col-span-1 flex items-center text-sm font-medium text-gray-900">
                    File Surat (PDF)
                </label>
                <div class="md:col-span-3">
                    <div class="flex items-center justify-center w-full">
                        <label for="file_surat" id="drop-area"
                            class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6 pointer-events-none">
                                <i class="fas fa-file-pdf text-red-500 text-3xl mb-2"></i>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk
                                        mengunggah</span> atau seret dan lepas</p>
                                <p class="text-xs text-gray-500">File PDF</p>
                            </div>
                            <input id="file_surat" name="file_surat" type="file" class="hidden" accept=".pdf"
                                required />
                        </label>
                    </div>
                    <div id="file-name" class="mt-2 text-sm text-gray-500"></div>
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('arsip.index') }}"
                    class="flex items-center justify-center px-5 py-2.5 text-sm font-medium text-gray-900 bg-gray-300 rounded-lg hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-200">
                    &laquo; Kembali
                </a>
                <button type="submit"
                    class="flex items-center justify-center px-5 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Unggah Surat
                </button>
            </div>
        </form>
    </div>

    <script>
        const dropArea = document.getElementById('drop-area');
        const fileInput = document.getElementById('file_surat');
        const fileNameDisplay = document.getElementById('file-name');

        // Highlight area saat drag
        dropArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropArea.classList.add('bg-blue-50', 'border-blue-400');
        });

        dropArea.addEventListener('dragleave', () => {
            dropArea.classList.remove('bg-blue-50', 'border-blue-400');
        });

        // Tangani file saat drop
        dropArea.addEventListener('drop', (e) => {
            e.preventDefault();
            dropArea.classList.remove('bg-blue-50', 'border-blue-400');
            const file = e.dataTransfer.files[0];
            if (file && file.type === "application/pdf") {
                fileInput.files = e.dataTransfer.files; // set file ke input hidden
                fileNameDisplay.textContent = 'File terpilih: ' + file.name;
            } else {
                fileNameDisplay.textContent = 'Hanya file PDF yang diperbolehkan.';
            }
        });

        // Tampilkan nama file jika pilih via klik
        fileInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
                fileNameDisplay.textContent = 'File terpilih: ' + file.name;
            }
        });
    </script>
@endsection
