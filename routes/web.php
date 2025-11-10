<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

require_once __DIR__ . "/_console.php";
require_once __DIR__ . "/_dev.php";

Route::get('/', [DashboardController::class, 'render'])->name('dashboard');

Route::get('/create', fn() => 'Placeholder')->name('book.create');
Route::get('/{userhash}/{bookhash}', fn($userhash, $bookhash) => "Editing book {$bookhash} for user {$userhash}")->name('book.edit');