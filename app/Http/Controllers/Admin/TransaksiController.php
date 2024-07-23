<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kursus;
use App\Models\Transaksi;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['user', 'kursus'])->paginate(10);
        return view('admin.transaksi.index', compact('transaksis'));
    }
    public function create()
    {
        $pesertas = User::where('role', 'user')->with(['transaksi'])->get();

        $lastTransaction = Transaksi::latest('id')->first();

        if ($lastTransaction) {
            $lastFakturNumber = intval(substr($lastTransaction->faktur, 5));
            $nextFakturNumber = $lastFakturNumber + 1;
            $faktur = 'FCRS-' . str_pad($nextFakturNumber, 4, '0', STR_PAD_LEFT);
        } else {
            $faktur = 'FCRS-0001';
        }

        return view('admin.transaksi.create', compact('pesertas', 'transaksis', 'faktur', 'id'));
    }
    public function createWithUserId(string $id)
    {
        $pesertas = User::where('role', 'user')->with(['transaksi'])->get();

        $lastTransaction = Transaksi::latest('id')->first();
        if ($lastTransaction) {
            $lastFakturNumber = intval(substr($lastTransaction->faktur, 5));
            $nextFakturNumber = $lastFakturNumber + 1;
            $faktur = 'FCRS-' . str_pad($nextFakturNumber, 4, '0', STR_PAD_LEFT);
        } else {
            $faktur = 'FCRS-0001';
        }

        $transaksis = Transaksi::where('peserta_id', $id)->get();
        $excludedKursusIds = $transaksis->pluck('kursus_id')->toArray();
        $kursuses = Kursus::whereNotIn('id', $excludedKursusIds)->get();

        return view('admin.transaksi.create', compact('pesertas', 'kursuses', 'transaksis', 'faktur', 'id'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'faktur' => 'required',
            'peserta_id' => 'required|integer',
            'kursus_id' => 'required|integer',
            'harga' => 'required',
            'catatan' => 'nullable|string',
        ]);
        $data = $request->all();

        Transaksi::create($data);

        return redirect()->route('peserta.index')
            ->with('success', 'Transaksi berhasil dibuat.');
    }
    public function show(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('admin.transaksi.show', compact('transaksi'));
    }
    public function edit(string $id)
    {
        $transaksis = Transaksi::findOrFail($id);
        $pesertas = User::where('role', 'user')->get();
        $kursuses = Kursus::all();
        return view('admin.transaksi.edit', compact('transaksis', 'pesertas', 'kursuses'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'faktur' => 'required',
            'peserta_id' => 'required|integer',
            'kursus_id' => 'required|integer',
            'harga' => 'required',
            'catatan' => 'nullable|string',
        ]);

        $data = $request->all();

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($data);

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil diupdate.');
    }
    public function destroy(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil dihapus.');
    }
    public function report(Request $request)
    {
        $transaksi = Transaksi::all();
        $totalHarga = $transaksi->sum('harga');
        // return view('admin.transaksi.report', compact('transaksi', 'totalHarga'));
        $data = [
            'title' => 'Laporan Transaksi',
            'date' => date('m/d/Y'),
            'transaksi' => $transaksi,
            'totalHarga' => $totalHarga
        ];
        $pdf = Pdf::loadView('admin.transaksi.report', $data);
        return $pdf->download('Data Transaksi.pdf');
    }
}
