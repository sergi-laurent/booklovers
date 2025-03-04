<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;
use App\Models\Group;
use App\Models\Wishlist;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(count:10)->create();
        Book::factory(count:10)->create();
        Group::factory(count:5)->create();
        Wishlist::factory(count:10)->create();



    }
}
