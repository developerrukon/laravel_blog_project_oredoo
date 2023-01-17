<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'rukon@gmail.com')->first();
        if($user){
            $user = new User();
            $user->name = 'Rukon Mia';
            $user->email = 'rukon@gmail.com';
            $user->name = Hash::make('12345678');
        }

    }
}
