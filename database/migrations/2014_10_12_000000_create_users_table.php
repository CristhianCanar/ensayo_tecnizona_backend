<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integerIncrements('id_user');
            $table->string('nombre','50');
            $table->string('telefono','15');
            /* $table->string('apellidos','50');
            *Crear path de imagen
            */
            $table->string('email','50')->unique();
            $table->string('password','100');
            $table->boolean('autorizacion_correo');
            //$table->boolean('terminos_condiciones')->nullable();
            $table->string('api_token','60')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
