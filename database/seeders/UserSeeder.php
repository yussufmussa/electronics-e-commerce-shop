<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name' => "yussuf mussa",
            'email' => "alphillipsa@gmail.com",
            'password' => Hash::make('G-YELT6V85SH'),
            'email_verified_at' => now(),
            'role_id' => 1,
        ]);

        User::create([
            'name' => "Mteja",
            'email' => "contact@yussufmussa.com",
            'password' => Hash::make('G-YELT6V85SH'),
            'email_verified_at' => now(),
            'role_id' => 2,
        ]);
    }
}
