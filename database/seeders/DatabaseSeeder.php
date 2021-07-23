<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesUsersTableSeeder::class);
        //$this->call(ModulosTableSeeder::class);
        //$this->call(ModulosRolesTableSeeder::class);
        $this->call(DepartamentosTable::class);
        $this->call(MunicipiosTable::class);
    }
}
