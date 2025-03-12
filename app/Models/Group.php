<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Group extends Model
{
    /** @use HasFactory<\Database\Factories\GroupFactory> */
    use HasFactory;

    protected $guarded = [];

    /*
    Chat-GPT prompt: I want every new group that is created to automatically generate one of these random codes 
    (like the ones in the seeder), this code has to be unique in the database. 
    */

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($group) {
            $group->code = self::generateUniqueCode();
        });
    }

    private static function generateUniqueCode()
    {
        do {
            $code = strtoupper(Str::random(6)); // Generates a 6-character random string
        } while (self::where('code', $code)->exists());

        return $code;
    }


    //Defining Many to Many relationship between Users and Groups
    public function users()
    {
        return $this->belongsToMany(User::class, 'group_user');
    }
}
