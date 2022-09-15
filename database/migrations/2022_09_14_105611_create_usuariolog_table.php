<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariologTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuariolog', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('usuario', 25);
            $table->string('accion', 25); //login, logout, resetpwd
            $table->string('ipclient', 25);
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
        Schema::dropIfExists('usuariolog');
    }
}
