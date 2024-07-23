<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kursus;

class UserController extends Controller
{
    public function index()
    {
        $kursuses = Kursus::inRandomOrder()->take(9)->get();
        return view('dashboard', compact('kursuses'));
    }
}
