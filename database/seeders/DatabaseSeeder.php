<?php

namespace Database\Seeders;

use App\Traits\Generics;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use Generics;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $admin = \App\Models\User::create([
            'user_id'=>$this->createUniqueID('users', 'user_id'),
            'firstname'=>"Admin",
            'lastname'=>"Admin",
            'email'=>"admin@gmail.com",
            'password'=>Hash::make('admin'),
            'isAdmin'=>1
        ]);
    }
}
