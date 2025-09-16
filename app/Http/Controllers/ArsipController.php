<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    public function index(Request $request)
    {
        // ambil data arsip dengan relasi kategori
        $query = Arsip::with('kategori');

        // pencarian
        if ($request->has('search') && $request->search != '') {
            $query->where('judul_surat', 'like', '%' . $request->search . '%');
        }

        // urutkan berdasarkan id terbaru
        $arsip = $query->orderBy('id', 'desc')->get();

        return view('pages.arsip.index', ['arsip' => $arsip]);
    }

    public function create()
    {
        // ambil data kategori
        $kategori = Kategori::get();

        return view(
            'pages.arsip.tambah-data',
            [
                'kategori' => $kategori
            ]
        );
    }

    public function store(Request $request)
    {
        // validasi input
        $validate = $request->validate([
            'no_surat' => 'required|string|max:255|unique:tb_arsip,no_surat',
            'judul_surat' => 'required|string|max:255',
            'kategori_id' => 'required|exists:tb_kategori,id',
            'file_surat' => 'required|mimes:pdf',
        ], [
            'no_surat.unique' => 'Nomor surat sudah ada, silakan gunakan yang lain.',
        ]);

        // cek file terkirim
        $filename = str_replace(['/', ' '], '-', $request->no_surat) . '.pdf';
        $request->file('file_surat')->storeAs('arsip', $filename, 'public');

        // simpan data arsip
        Arsip::create([
            'no_surat' => $request->no_surat,
            'judul_surat' => $request->judul_surat,
            'file_surat' => $filename,
            'kategori_id' => $request->kategori_id,
            'waktu_upload' => now(),
        ]);

        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil ditambahkan.');
    }

    public function show(Arsip $arsip)
    {
        return view('pages.arsip.lihat-data', ['arsip' => $arsip]);
    }

    public function updateFile(Request $request, Arsip $arsip)
    {
        // validasi input
        $request->validate([
            'file_surat' => 'required|mimes:pdf',
        ]);

        // cek file terkirim
        if (!$request->hasFile('file_surat')) {
            return back()->withErrors(['file_surat' => 'File tidak terkirim.']);
        }

        // hapus file lama
        if ($arsip->file_surat && Storage::disk('public')->exists('arsip/' . $arsip->file_surat)) {
            Storage::disk('public')->delete('arsip/' . $arsip->file_surat);
        }

        // simpan file baru
        $filename = str_replace(['/', ' '], '-', $arsip->no_surat) . '.pdf';
        $request->file('file_surat')->storeAs('arsip', $filename, 'public');
        $arsip->update([
            'file_surat' => $filename,
        ]);

        return redirect()->route('arsip.show', $arsip)->with('success', 'File berhasil diganti.');
    }

    public function download(Arsip $arsip)
    {
        // ambil path file
        $filePath = 'arsip/' . $arsip->file_surat;

        // cek file ada
        if (!Storage::disk('public')->exists($filePath)) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }

        // download file
        return Storage::disk('public')->download($filePath, $arsip->file_surat);
    }

    public function destroy(Arsip $arsip)
    {
        // hapus file dari storage
        if ($arsip->file_surat && Storage::disk('public')->exists('arsip/' . $arsip->file_surat)) {
            Storage::disk('public')->delete('arsip/' . $arsip->file_surat);
        }

        // hapus data arsip dari database
        $arsip->delete();

        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil dihapus.');
    }
}
