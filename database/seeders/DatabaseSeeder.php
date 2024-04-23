<?php

namespace Database\Seeders;

use App\Models\Post;
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
        for ($i = 1; $i <= 10; $i++) {
            $user = User::factory()->create([
                'name' => 'test' . $i,
                'email' => 'test' . $i . '@example.com',
                'password' => bcrypt('test1234'),
            ]);

            Post::factory(3)->for($user)->create([
                'created_at' => now()->addHours(-1 * 10 * $i)->toDateTimeString(),
            ]);
        }
    }
}
