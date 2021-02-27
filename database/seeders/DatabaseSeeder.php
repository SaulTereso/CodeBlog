<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Posts;
use App\Models\Tags;

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
        User::factory(100)->create();
        Category::factory(100)->create();
        Posts::factory(100)->create();
        Tags::factory(100)->create();

    }

}