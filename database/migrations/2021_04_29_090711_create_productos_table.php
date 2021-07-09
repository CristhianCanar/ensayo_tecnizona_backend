<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id_producto');
            $table->string('PartNum', '80');
            $table->string('Familia', '80');
            $table->string('Categoria', '80');
            $table->text('Name');
            $table->text('Description');
            $table->string('Marks', '80');
            $table->double('Salesminprice');
            $table->double('Salesmaxprice');
            $table->double('precio');
            $table->string('CurrencyDef', '10');
            $table->mediumInteger('Quantity');
            $table->string('TributariClassification', '20');
            $table->string('NombreImagen', '200');
            $table->double('Descuento');
            $table->double('shipping');
            /*
                $table->string('condition');
                $table->string('category');
                $table->string('color');
                $table->string('width');
                $table->string('height');
                $table->string('depth');
                $table->string('dimensions_unit');
                $table->string('weight');
                $table->string('weight_unit');
                $table->string('shipping_width');
                $table->string('shipping_height');
                $table->string('shipping_depth');
                */
            $table->string('Sku', '25');
            $table->boolean('destacado')->nullable();
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
        Schema::dropIfExists('productos');
    }
}
