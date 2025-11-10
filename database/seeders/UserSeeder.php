<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'jordangerber@gmail.com',
            'password' => Hash::make('jordan'),
            'info' => [
                'name' => 'Jordan Gerber',
                'books' => [
                    [
                        'title' => 'Test Book 1',
                        'slug' => Str::slug('Test Book 1', '-'),
                        'hash' => md5(Str::slug('Test Book 1', '-')),
                        'cover' => null
                    ],
                    [
                        'title' => 'Test Book 2',
                        'slug' => Str::slug('Test Book 2', '-'),
                        'hash' => md5(Str::slug('Test Book 2', '-')),
                        'cover' => null
                    ],
                ]
            ],
        ]);
    }
}