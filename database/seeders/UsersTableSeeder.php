<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->nombre   = 'Admin';
        $user->correo    = 'admin@admin.com';
        $user->password  = Hash::make('admin0000');
        $user->save();
    }
}
