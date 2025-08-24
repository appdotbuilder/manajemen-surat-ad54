<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\IncomingLetterController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/health-check', function () {
    return response()->json([
        'status' => 'ok',
        'timestamp' => now()->toISOString(),
    ]);
})->name('health-check');

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Employee Management
    Route::resource('employees', EmployeeController::class);
    
    // Incoming Letters
    Route::resource('incoming-letters', IncomingLetterController::class);
    
    // Placeholder routes for dashboard links
    Route::get('/outgoing-letters', fn() => Inertia::render('coming-soon', ['title' => 'Surat Keluar']))->name('outgoing-letters.index');
    Route::get('/dispositions', fn() => Inertia::render('coming-soon', ['title' => 'Disposisi']))->name('dispositions.index');
    Route::get('/reports/monthly', fn() => Inertia::render('coming-soon', ['title' => 'Laporan Bulanan']))->name('reports.monthly');
    Route::get('/reports/disposition-timeline', fn() => Inertia::render('coming-soon', ['title' => 'Timeline Disposisi']))->name('reports.disposition-timeline');
    Route::get('/reports/export', fn() => Inertia::render('coming-soon', ['title' => 'Export Excel']))->name('reports.export');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
