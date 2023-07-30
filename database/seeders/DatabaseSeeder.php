<?php

namespace Database\Seeders;

use App\Models\Server;
use App\Models\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // rand(0, 50)

        Server::factory(20)
        ->has(Log::factory()->count(rand(0, 50)), 'logs')
        ->create();
        //Log::factory(5)->create();
    }
}
