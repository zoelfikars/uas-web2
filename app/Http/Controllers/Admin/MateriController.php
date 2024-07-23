<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kursus;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $materis = Materi::with(['kursus'])->paginate(10);

        return view('admin.materi.index', compact('materis'));
    }
    public function create()
    {
        $kursuses = Kursus::all();
        return view('admin.materi.create', compact('kursuses'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'kursus_id' => 'required|integer',
            'judul' => 'required|string',
            'deskripsi' => 'nullable|string',
        ]);

        $data = $request->all();
        Materi::create($data);

        return redirect()->route('materi.index')
            ->with('success', 'Materi berhasil ditambahkan.');
    }
    public function show(string $id)
    {

    }
    public function edit(string $id)
    {
        $materis = Materi::findOrFail($id);
        $kursuses = Kursus::all();
        return view('admin.materi.edit', compact('materis', 'kursuses'));
    }

    public function update(Request $request, Materi $materi)
    {
        $data = $request->all();
        $request->validate([
            'kursus_id' => 'required|integer',
            'judul' => 'required|string',
            'deskripsi' => 'nullable|string',
        ]);
        $materi->update($data);

        return redirect()->route('materi.index')
            ->with('success', 'Materi berhasil diupdate.');
    }
    public function destroy(string $id)
    {
        $materis = Materi::findOrFail($id);
        $materis->delete();

        return redirect()->route('materi.index')
            ->with('success', 'Materi berhasil dihapus.');
    }
}
