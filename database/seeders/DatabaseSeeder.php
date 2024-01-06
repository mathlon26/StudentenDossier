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
        
        $user = User::factory()->create();

        Dossier::factory()->create([
            'user_id' => $user->id,
            'name' => $user->value('name'),
            'lastname' => $user->value('lastname'),
            'email' => $user->value('email'),
            'phonenumber' => $user->value('phonenumber'),
            'avatar_url' => "https://cdn1.iconfinder.com/data/icons/user-pictures/100/unknown-512.png"
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
