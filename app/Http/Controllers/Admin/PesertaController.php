<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $pesertas = User::where('role', 'user')->paginate(10);
        return view('admin.peserta.index', compact('pesertas'));
    }
    public function create()
    {

    }
    public function store(Request $request)
    {

    }
    public function show(string $id)
    {
        $pesertas = User::where('id', $id)->get();
        $transaksi = Transaksi::where('peserta_id', $id)->with(['user', 'kursus'])->paginate(10);

        return view('admin.peserta.detail', compact('pesertas', 'transaksi'));
    }
    public function edit(string $id)
    {

    }
    public function update(Request $request, string $id)
    {

    }
    public function destroy(string $id)
    {

    }
}
