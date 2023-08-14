<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'email' => 'admin@email.com',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'firstname' => 'Administrator'
        ]);
        User::create([
            'email' => 'user1@email.com',
            'username' => 'user1',
            'password' => bcrypt('user1'),
            'firstname' => 'User 1'
        ]);
        User::create([
            'email' => 'user2@email.com',
            'username' => 'user2',
            'password' => bcrypt('user2'),
            'firstname' => 'User 2'
        ]);
    }
}
