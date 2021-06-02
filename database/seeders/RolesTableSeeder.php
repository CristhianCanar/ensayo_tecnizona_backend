<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Rol();
        $role->rol         = 'admin';
        $role->descripcion = 'Administrator';
        $role->save();

        $role = new Rol();
        $role->rol         = 'user';
        $role->descripcion = 'Usuario';
        $role->save();

        $role = new Rol();
        $role->rol         = 'cliente';
        $role->descripcion = 'Cliente';
        $role->save();
    }
}
