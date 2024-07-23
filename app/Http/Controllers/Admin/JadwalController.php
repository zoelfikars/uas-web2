<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Materi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::with('materi')->paginate(10);
        return view('admin.jadwal.index', compact('jadwals'));
    }
    public function create()
    {
        $materis = Materi::doesntHave('jadwal')->get();
        return view('admin.jadwal.create', compact('materis'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'materi_id' => 'required|exists:materis,id',
            'dates' => 'required|string',
            'start_time' => 'required|string',
            'end_time' => 'required|string|after:start_time',
        ]);
        $data = $request->all();

        try {
            $date = Carbon::createFromFormat('m/d/Y', $data['dates'])->format('Y-m-d');
            $data['start_time'] = Carbon::parse($date . ' ' . $data['start_time'])->format('Y-m-d H:i:s');
            $data['end_time'] = Carbon::parse($date . ' ' . $data['end_time'])->format('Y-m-d H:i:s');
            $data['dates'] = $date . ' 00:00:00';
        } catch (\Exception $e) {
            return back()->withErrors(['dates' => 'Format tanggal tidak valid.']);
        }
        Jadwal::create($data);

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil dibuat.');
    }
    public function show(Jadwal $jadwal)
    {

    }
    public function edit(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->dates = Carbon::parse($jadwal->dates)->format('m/d/Y');
        $jadwal->start_time = Carbon::parse($jadwal->start_time)->format('H:i');
        $jadwal->end_time = Carbon::parse($jadwal->end_time)->format('H:i');
        $materis = Materi::all();
        return view('admin.jadwal.edit', compact('jadwal', 'materis'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'materi_id' => 'required|exists:materis,id',
            'dates' => 'required|string',
            'start_time' => 'required|string',
            'end_time' => 'required|string|after:start_time',
        ]);
        $data = $request->all();
        try {
            $date = Carbon::createFromFormat('m/d/Y', $data['dates'])->format('Y-m-d');
            $data['start_time'] = Carbon::parse($date . ' ' . $data['start_time'])->format('Y-m-d H:i:s');
            $data['end_time'] = Carbon::parse($date . ' ' . $data['end_time'])->format('Y-m-d H:i:s');
            $data['dates'] = $date . ' 00:00:00';
        } catch (\Exception $e) {
            return back()->withErrors(['dates' => 'Format tanggal tidak valid.']);
        }
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($data);

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil dipdate.');
    }
    public function destroy(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus.');
    }
}
