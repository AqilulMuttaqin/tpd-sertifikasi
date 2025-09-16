<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $query = Kategori::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama_kategori', 'like', '%' . $request->search . '%');
        }

        $kategori = $query->orderBy('id', 'asc')->get();
        
        return view('pages.kategori.index', ['kategori' => $kategori]);
    }

    public function create()
    {
        return view('pages.kategori.tambah-data');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:tb_kategori,nama_kategori',
            'keterangan' => 'required|string|max:500',
        ], [
            'nama_kategori.unique' => 'Nama kategori sudah ada, silakan gunakan yang lain.',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function show(Kategori $kategori)
    {
        return view('pages.kategori.edit-data', ['kategori' => $kategori]);
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validate = $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:tb_kategori,nama_kategori,' . $kategori->id,
            'keterangan' => 'required|string|max:500',
        ], [
            'nama_kategori.unique' => 'Nama kategori sudah ada, silakan gunakan yang lain.',
        ]);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori)
    {
        if ($kategori->arsip()->count() > 0) {
            return redirect()->route('kategori.index')->with('error', 'Kategori tidak dapat dihapus karena masih memiliki arsip terkait.');
        }

        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
