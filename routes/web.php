<?php

use Illuminate\Support\Facades\Route;

require_once __DIR__ . "/_console.php";
require_once __DIR__ . "/_dev.php";

Route::get('/', fn() => "Dashboard")->name('dashboard');