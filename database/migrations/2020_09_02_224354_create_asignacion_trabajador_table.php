<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionTrabajadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion_trabajador', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('trabajador_id')->constrained('trabajador');
            $table->date("fechaingreso");
            $table->foreignId('cargolaboral_id')->constrained('cargo_laboral');
            $table->foreignId('vinculolaboral_id')->constrained('vinculo_laboral');
            $table->decimal("remuneracion", 10, 2);
            $table->string("horario", 250);
            $table->foreignId('cliente_id')->constrained('cliente');
            $table->foreignId('regimenpension_id')->constrained('regimen_pension');
            $table->foreignId('regimensalud_id')->constrained('regimen_salud');
            $table->jsonb("depositosueldo");
            $table->foreignId('periodicidadremuneracion_id')->constrained('periodicidad_remuneracion');
            $table->foreignId('tipocontrato_id')->constrained('tipo_contrato');
            $table->foreignId('tipotrabajadorasig_id')->constrained('tipo_trabajador_asig');
            $table->jsonb("materialtrabajo");
            $table->jsonb("documentacion");
            $table->jsonb("motivocese");
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
        Schema::dropIfExists('asignacion_trabajador');
    }
}
