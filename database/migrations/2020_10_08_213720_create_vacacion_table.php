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
            $table->integer('periodo');
            $table->integer("dias_tomados");
            $table->date("fecha_inicio");
            $table->text("observaciones");
            $table->boolean("estado");

            $table->string('user_created', 25)->nullable();
            $table->string('user_modified', 25)->nullable();
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
