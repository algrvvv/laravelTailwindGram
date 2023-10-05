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
        AdminUser::factory(1)->create([
             "username" => "admin",
             "email"    => "admin@admin.ru",
             "password" => bcrypt("admin")
        ]);
        
         User::factory()
             ->count(25)
             ->hasPosts(3)
             ->create();

        Comments::factory(35)->create();
    }
}
