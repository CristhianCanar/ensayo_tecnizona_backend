<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('id_pedido');
            $table->unsignedInteger('user_id');/*id del usuario logeado quien realiza el pedido*/
            $table->string('AccountNum', '30');/*NIT cliente*/
            $table->string('NombreClienteEntrega', '150');/*Nombre del cliente al cual se va a entregar el producto*/
            $table->string('ClienteEntrega', '80');/*Identificacion del cliente de entrega */
            $table->string('TelefonoEntrega', '20');
            $table->string('DireccionEntrega', '200');
            $table->string('StateId', '2');/*Deparatamento segun DANE*/
            $table->string('CountyId', '3');/*Municipio segun DANE*/
            $table->boolean('RecogerEnSitio');
            $table->boolean('EntregaUsuarioFinal');
            $table->longText('listaPedidoDetalle');

            //Atributos dependientes de la respuesta e interaccion con la api
            $table->string('estado_pedido','10')->nullable();//Realizado, Pendiente, Fallido
            $table->longText('respuesta_api_mps')->nullable();

            //Campos que pueden ser nulos en la api
            $table->string('dlvTerm', '150')->nullable();/*Tipo transportadora*/
            $table->string('dlvmode', '150')->nullable();/*Servicio de entrega*/
            $table->text('Observaciones')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id_user')
                ->on('users')
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
        Schema::dropIfExists('pedidos');
    }
}
