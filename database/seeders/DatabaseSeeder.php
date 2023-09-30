<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AdminUser;
use App\Models\Comments;
use App\Models\Post;
use App\Models\User;
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

        // AdminUser::factory(1)->create([
        //     "username" => "admin",
        //     "email"    => "admin@admin.ru",
        //     "password" => bcrypt("admin")
        // ]);
        // Post::factory(100)->create();
        // User::factory(10)->create();

        User::factory()
            ->count(10)
            ->hasPosts(1)
            ->create();
        
        // Comments::factory(350)->create();

        // User::factory()
        //     ->count(25)
        //     ->hasPosts(3)
        //     ->create();

        // User::factory()
        //     ->count(5)
        //     ->hasPosts(5)
        //     ->create();

        // User::factory()
        //     ->count(50)
        //     ->hasPosts(2)
        //     ->create();

        // User::factory()
        //     ->count(20)
        //     ->hasPosts(1)
        //     ->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
