<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kursus;
use App\Models\Materi;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    public function index()
    {
        $materis = Materi::all();

        $userId = auth()->id();
        $transaksis = Transaksi::where('peserta_id', $userId)->get();
        $excludedKursusIds = $transaksis->pluck('kursus_id')->toArray();

        $kursuses = Kursus::whereNotIn('id', $excludedKursusIds)->paginate(5);
        return view('kursus', compact('kursuses', 'materis'));
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
    }
    public function show(Kursus $kursus)
    {
    }
    public function edit(Kursus $kursus)
    {
    }
    public function update(Request $request, Kursus $kursus)
    {
    }
    public function destroy(Kursus $kursus)
    {
    }
    public function search(Request $request)
    {
        $query = $request->input('key');

        $userId = auth()->id();
        $transaksis = Transaksi::where('peserta_id', $userId)->get();
        $excludedKursusIds = $transaksis->pluck('kursus_id')->toArray();

        $kursuses = Kursus::whereNotIn('id', $excludedKursusIds)
            ->where('nama', 'LIKE', "%{$query}%")
            ->orWhere('deskripsi', 'LIKE', "%{$query}%")
            ->paginate(10);

        $materis = Materi::all();

        return view('kursus', compact('kursuses', 'materis'));
    }
    public function beli(Request $request)
    {
        // dd($request);
        $request->validate([
            'id' => 'required|string',
        ]);
        $lastTransaction = Transaksi::latest('id')->first();
        $kursus = Kursus::findOrFail($request->id);
        if ($lastTransaction) {
            $lastFakturNumber = intval(substr($lastTransaction->faktur, 5));
            $nextFakturNumber = $lastFakturNumber + 1;
            $faktur = 'FCRS-' . str_pad($nextFakturNumber, 4, '0', STR_PAD_LEFT);
        } else {
            $faktur = 'FCRS-0001';
        }

        $transaksi = new Transaksi();
        $transaksi->faktur = $faktur;
        $transaksi->peserta_id = auth()->id();
        $transaksi->kursus_id = $kursus->id;
        $transaksi->harga = $kursus->harga;
        $transaksi->catatan = $kursus->nama . " bukti bayar";
        $transaksi->save();

        return redirect()->route('kursus.index')->with('success', 'Kursus berhasil dibeli.');
    }
}
