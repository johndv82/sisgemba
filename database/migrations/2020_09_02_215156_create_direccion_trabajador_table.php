<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionTrabajadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccion_trabajador', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('trabajador_id')->constrained('trabajador');
            $table->string("tipodireccion", 50);
            $table->string("distrito", 100);
            $table->string("provincia", 100);
            $table->string("departamento", 100);
            $table->string("domicilio", 250);
            $table->tinyInteger("estado");
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
        Schema::dropIfExists('direccion_trabajador');
    }
}
