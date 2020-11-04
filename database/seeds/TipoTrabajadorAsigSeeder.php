<?php

use Illuminate\Database\Seeder;

class TipoTrabajadorAsigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_trabajador_asig')->insert([
            [
                'nombre' => 'Ejecutivo',
                'observaciones' => 'NA',
                'estado' => true,
            ],
            [
                'nombre' => 'Persona con convenio de Modalidad Formativa',
                'observaciones' => 'NA',
                'estado' => true,
            ],
            [
                'nombre' => 'Empleado',
                'observaciones' => 'NA',
                'estado' => true,
            ],
            [
                'nombre' => 'Pensionista',
                'observaciones' => 'NA',
                'estado' => true,
            ]
        ]);
    }
}
