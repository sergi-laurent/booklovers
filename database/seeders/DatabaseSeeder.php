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
        Wishlist::factory(count:10)->create();

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




    }
}
