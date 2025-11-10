<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

require_once __DIR__ . "/_console.php";
require_once __DIR__ . "/_dev.php";

Route::get('/', [DashboardController::class, 'render'])->name('dashboard');

Route::prefix('book')->name('book.')->group(function () {
    Route::get('/create', fn() => 'Placeholder')->name('create');
    Route::get('/{path}', fn() => 'Placeholder')->name('edit');
});