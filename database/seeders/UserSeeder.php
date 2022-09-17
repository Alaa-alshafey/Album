<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            "name"=>"Admin",
            'email'=>"admin@admin.com",
            "Password"=>Hash::make("123456789")
        ]);
    }
}
