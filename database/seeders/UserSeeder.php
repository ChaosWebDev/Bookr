<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'email' => 'jordangerber@gmail.com',
            'password' => Hash::make('jordan'),
            'info' => [
                'name' => 'Jordan Gerber'
            ],
        ]);

        $str = json_encode($user);

        $this->command->info("Created user: {$str}");

        // User::factory(10)->create();
    }
}