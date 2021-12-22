<?php

namespace Database\Seeders;
use App\Models\user;
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
        $user = new User();
        $user->name = 'Admin pasien';
        $user->email = 'Admin@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();

        $user = new User();
        $user->name = 'jojo';
        $user->email = 'jojo@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();

        $user = new User();
        $user->name = 'klarisa';
        $user->email = 'klarisa@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();

        $user = new User();
        $user->name = 'amelia';
        $user->email = 'amelia@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();

        $user = new User();
        $user->name = 'adinda';
        $user->email = 'adinda@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();
    }
}
