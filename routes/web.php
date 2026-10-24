<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task; // <--- PASTIKAN BARIS INI ADA!

// Halaman Utama / Homepage
Route::get('/', function () {
    return view('homepage1');
})->name('home');

// Halaman Dashboard
Route::get('/dashboard', function () {
    // Mengambil data dari database via Model Task
    $tasks = Task::all();
    
    $stats = [
        ['label' => 'Total Tugas', 'value' => $tasks->count()],
        ['label' => 'Proyek Selesai', 'value' => $tasks->where('status', 'Completed')->count()],
        ['label' => 'Pending Task', 'value' => $tasks->where('status', 'Pending')->count()],
    ];
    $userStatus = 'Active';

    return view('dashboar', compact('tasks', 'stats', 'userStatus'));
})->name('dashboard');

// Halaman Kalender
Route::get('/kalender', function () {
    return view('kalender');
})->name('kalender');

// Halaman Ruang Cloud
Route::get('/ruang-cloud', function () {
    return view('ruangcloud');
})->name('cloud');

// Halaman Ruang Kolaborasi
Route::get('/ruang-kolaborasi', function () {
    return view('ruangkolaborasi');
})->name('kolaborasi');

// Halaman User / Profil
Route::get('/user', function () {
    return view('user');
})->name('user');