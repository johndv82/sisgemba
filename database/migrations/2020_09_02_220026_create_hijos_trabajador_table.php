<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHijosTrabajadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hijos_trabajador', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('trabajador_id')->constrained('trabajador');
            $table->string("apellidopaterno", 250);
            $table->string("apellidomaterno", 250);
            $table->string("nombres", 250);
            $table->foreignId('tipodocumento_id')->constrained('tipo_documento');
            $table->string("numerodocumento", 50);
            $table->date("fechanacimiento");
            $table->string("ocupacion", 250);
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
        Schema::dropIfExists('hijos_trabajador');
    }
}
