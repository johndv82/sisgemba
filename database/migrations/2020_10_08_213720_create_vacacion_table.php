<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacacion', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('trabajador_id')->constrained('trabajador');
            $table->integer("dias_tomados");
            $table->string("motivo", 100);
            $table->text("observaciones");
            $table->boolean("es_permiso");
            $table->date("fecha_inicio");
            $table->boolean("estado");
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
        Schema::dropIfExists('vacacion');
    }
}
