<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;
use App\Models\Group;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Hash;


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

        $my_user = User::create([
            'name'=>'Sergi Laurent',
            'email'=>'sergilaurents@gmail.com',
            'password'=>Hash::make('password'),
            ]);

        $users = User::factory(count:10)->create();
        $books = Book::factory(count:20)->create();
        Group::factory(count:5)->create();

        // Ensure my_user gets a wishlist
        // Chat-gpt prompt -> Why is my manually created user not getting a wishlist?
        // Chat-gpt recommendation -> manually assign a wishlist to my personal user -> BEFORE the other users
        Wishlist::factory()->create([
            'user_id' => $my_user->id,
        ]);        
    
       // Assign a wishlist to each user -> in a One to One relationship
       // Chat-gpt prompt -> How do i seed the database for a One to One relationship between a user and a wishlist?
       foreach ($users as $user) {
            Wishlist::factory()->create(['user_id' => $user->id]);
        }

       //Add books to users
       foreach($users as $user){
        $random_number = random_int(1,10);
        $books = Book::inRandomOrder()->take($random_number)->get();
        $user->books()->attach($books);
       }

       //add books to My own User
       $random_number = random_int(1,10);
       $books = Book::inRandomOrder()->take($random_number)->get();
       $my_user->books()->attach($books);


       //Add books to wishlists
       foreach(Wishlist::all() as $wishlist){
        $random_number = random_int(1,10);
        $books = Book::inRandomOrder()->take($random_number)->get();
        $wishlist->books()->attach($books);
       }

       



    }
}
