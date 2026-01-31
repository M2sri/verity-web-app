<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@verity.com',
            'password' => Hash::make('Hello123'),
            'role' => 'admin',
        ]);
    }
}
