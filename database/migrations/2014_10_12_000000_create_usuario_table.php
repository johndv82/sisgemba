<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 250);
            $table->string('apellidos', 250);
            $table->string('dni', 8)->unique();
            $table->string('email', 250);
            $table->integer('rol_id');
            $table->string('name', 25)->unique();
            $table->string('password', 500);
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean("estado");
            $table->rememberToken();
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
        Schema::dropIfExists('usuario');
    }
}
