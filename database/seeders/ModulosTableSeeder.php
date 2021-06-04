<?php

namespace Database\Seeders;

use App\Models\Modulo;
use Illuminate\Database\Seeder;

class ModulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modulo = new Modulo();
        $modulo->modulo = "Tablero";
        $modulo->url_modulo = "home";
        $modulo->icono = "nav-icon fas fa-chalkboard";
        $modulo->orden = 99;
        $modulo->save();
    }
}
