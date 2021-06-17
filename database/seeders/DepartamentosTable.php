<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class DepartamentosTable extends CsvSeeder
{
    public function __construct()
    {
        $this->table_name = 'departamentos';
        $this->file = '/database/seeders/csvs/departamentos.csv';
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();
        DB::table($this->table_name)->truncate();
        parent::run();
    }
}
