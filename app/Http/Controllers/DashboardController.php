<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $title, $bodyClass;

    public function __construct()
    {
        $this->title = "Bookr - Dashboard";
        $this->bodyClass = "dark";
    }

    public function render()
    {
        return view('dashboard', [
            'title' => $this->title,
            'bodyClass' => $this->bodyClass,
        ]);
    }
}
