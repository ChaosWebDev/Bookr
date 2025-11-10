<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public ?User $user;
    public $pageTitle;
    public $books = [];

    public function __construct()
    {
        $this->pageTitle = "Bookr - Dashboard";

        $this->user = Auth::user();
        $this->getBooks();
    }

    protected function getBooks()
    {
        $this->books = $this->user->info?->books ?? [];
    }

    public function render()
    {
        return view('dashboard', [
            'title' => $this->pageTitle ?? null,
            'books' => $this->books ?? [],
        ]);
    }
}
