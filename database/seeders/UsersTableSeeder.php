<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user->nombre                   = 'Admin';
        $user->email                    = 'admin@admin.com';
        $user->telefono                 = '32212345678';
        $user->autorizacion_correo      = 1;
        $user->password                 = Hash::make('admin0000');
        $user->save();
    }
}
