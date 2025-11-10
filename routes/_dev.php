<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/**
 * Developer routes
 */


if (app()->environment('local')) {
    if (!Auth::user()) {
        $user = User::first();
        Auth::login($user);
    }


    Route::get('/clear', function () {
        Artisan::call('optimize:clear');
        if (Auth::check())
            Auth::logout();
        return redirect()->route('dashboard');
    });
}
