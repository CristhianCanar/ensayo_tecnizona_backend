<?php

use App\RolUser;
use Illuminate\Database\Seeder;

class RolesUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol_user = new RolUser();
        $rol_user->user_id  = '1';
        $rol_user->rol_id   = '1';
        $rol_user->save();
    }
}
