<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulosRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos_roles', function (Blueprint $table) {
            $table->integerIncrements('id_modulo_rol');
            $table->unsignedSmallInteger('modulo_id');
            $table->unsignedSmallInteger('rol_id');
            $table->timestamps();

            $table->foreign('rol_id')
                ->references('id_rol')
                ->on('roles')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('modulo_id')
                ->references('id_modulo')
                ->on('modulos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulos_roles');
    }
}
