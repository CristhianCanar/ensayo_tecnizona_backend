<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos', function (Blueprint $table) {
            $table->smallIncrements('id_modulo');
            $table->smallInteger('id_modulo_padre')->nullable();
            $table->string('modulo','50')->nullable();
            $table->string('url_modulo','80')->nullable();
            $table->string('icono','30')->nullable();
            $table->smallInteger('orden')->nullable();
            $table->smallInteger('hijos')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulos');
    }
}
