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
        $role->rol         = 'Administrator';
        $role->descripcion = 'Se encarga de la administracion de la plataforma, implicando modificaciones y configuraciones en el sistema';
        $role->save();

        $role = new Rol();
        $role->rol         = 'Usuario';
        $role->descripcion = 'Puede visualizar mas no efectuar cambios, con la posibilidad de obtener reportes';
        $role->save();

        $role = new Rol();
        $role->rol         = 'Cliente';
        $role->descripcion = 'Cliente sera redireccionado a la pagina de compras';
        $role->save();
    }
}
