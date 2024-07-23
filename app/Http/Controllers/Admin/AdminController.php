<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kursus;
use App\Models\Materi;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Jumlah user yang teregistrasi sebagai peserta
        $totalUsers = User::where('role', 'peserta')->count();
        
        // Jumlah user yang teregistrasi sebagai admin
        $totalAdmins = User::where('role', 'admin')->count();
        
        // Jumlah kursus
        $totalCourses = Kursus::count();
        
        // Jumlah materi
        $totalMaterials = Materi::count();
        
        // Jumlah materi yang belum memiliki jadwal
        $materialsWithoutSchedule = Materi::doesntHave('jadwal')->count();
        
        // Jumlah transaksi
        $totalTransactions = Transaksi::count();
        
        // Total pendapatan dari transaksi
        $totalTransactionValue = Transaksi::sum('harga');

        return view('admin.dashboard', compact('totalUsers', 'totalAdmins', 'totalCourses', 'totalMaterials', 'materialsWithoutSchedule', 'totalTransactions', 'totalTransactionValue'));
    }
}
