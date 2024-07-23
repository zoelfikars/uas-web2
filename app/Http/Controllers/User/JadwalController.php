<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::where('peserta_id', Auth::id())->with(['kursus.materi.jadwal'])->paginate(5);
        return view('jadwal', compact('transaksis'));
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
    }
    public function show(Jadwal $jadwal)
    {
    }
    public function edit(Jadwal $jadwal)
    {
    }
    public function update(Request $request, Jadwal $jadwal)
    {
    }
    public function destroy(Jadwal $jadwal)
    {
    }
    public function search(Request $request)
    {
        $query = $request->input('key');

        $transaksis = Transaksi::where('peserta_id', Auth::id())->with(['kursus.materi.jadwal'])->whereHas('kursus', function ($q) use ($query) {
            $q->where('nama', 'LIKE', "%{$query}%");
        })->paginate(5);

        return view('jadwal', compact('transaksis'));
    }
}
