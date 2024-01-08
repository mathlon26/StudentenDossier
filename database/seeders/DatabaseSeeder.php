<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Dossier;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i = 0; $i < 200; $i++) {
            $user = User::factory()->create();
            
            Dossier::factory()->create([
                'user_id' => $user->id,
                'name' => $user->name,
                'lastname' => $user->lastname,
                'email' => $user->email,
                'phonenumber' => $user->phonenumber,
                'avatar_url' => "https://cdn1.iconfinder.com/data/icons/user-pictures/100/unknown-512.png"
            ]);
        }
    }
}
