<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("razonsocial", 250);
            $table->string("nombrecomercial", 250);
            $table->string("ruc", 11);
            $table->jsonb("contacto");
            $table->string("domicilio", 500);
            $table->integer("distrito");
            $table->integer("provincia");
            $table->integer("departamento");
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
        Schema::dropIfExists('cliente');
    }
}
