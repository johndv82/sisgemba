<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajador', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("apellidopaterno", 250);
            $table->string("apellidomaterno", 250);
            $table->string("nombres", 250);
            $table->foreignId('tipodocumento_id')->constrained('tipo_documento');
            $table->string("numerodocumento", 50);
            $table->string("paisorigen", 250);
            $table->string("ciudadorigen", 250);
            $table->date("fechanacimiento");
            $table->foreignId('estadocivil_id')->constrained('estado_civil');
            $table->string("email", 250);
            $table->string("numerofijo", 50);
            $table->string("numerocelular", 50);
            $table->jsonb("datosconyugue");
            $table->jsonb("datosemergencia");
            $table->jsonb("datosestudio");
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
        Schema::dropIfExists('trabajador');
    }
}
