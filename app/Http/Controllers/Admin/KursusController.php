<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kursus;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    public function index()
    {
        $kursuses = Kursus::paginate(10);
        return view('admin.kursus.index', compact('kursuses'));
    }
    public function create()
    {
        return view('admin.kursus.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
        ]);

        $data = $request->all();

        Kursus::create($data);

        return redirect()->route('kursus.index')
            ->with('success', 'Kursus berhasil dibuat.');
    }
    public function show(Kursus $kursus)
    {

    }
    public function edit(string $id)
    {
        $kursus = Kursus::findOrFail($id);
        return view('admin.kursus.edit', compact('kursus'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
        ]);

        $data = $request->all();

        $kursus = Kursus::findOrFail($id);
        $kursus->update($data);

        return redirect()->route('kursus.index')
            ->with('success', 'Kursus berhasil diupdate.');
    }
    public function destroy(string $id)
    {
        $kursus = Kursus::findOrFail($id);
        $kursus->delete();

        return redirect()->route('kursus.index')
            ->with('success', 'Kursus berhasil dihapus.');
    }
}
