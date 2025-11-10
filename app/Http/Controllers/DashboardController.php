<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $title;

    public function __construct()
    {
        $this->title = "Bookr - Dashboard";
    }

    public function render()
    {
        return view('dashboard', [
            'title' => $this->title ?? null,
        ]);
    }
}
