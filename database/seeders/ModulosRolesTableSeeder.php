<?php

namespace Database\Seeders;

use App\Models\ModuloRol;
use Illuminate\Database\Seeder;

class ModulosRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modulo_rol = new ModuloRol();
        $modulo_rol->rol_id = 1;
        $modulo_rol->modulo_id = 1;
        $modulo_rol->save();
    }
}
