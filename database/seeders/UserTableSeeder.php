<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
    */
    public function run()
    {
        $user = User::create([
            'name'      => "admin",
            'lname'      => "admin",
            'image'      => 'admin.png',
            'email'     =>'admin@admin.com',
            "gender"    =>'male',
            "role"      =>'supperAdmin',
            'password'  => bcrypt('password'),
           
        ]);
    }
    
}
