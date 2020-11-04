<?php

use Illuminate\Database\Seeder;

class EstadoTrabajadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado_trabajador')->insert([
            [
                'id' => 1,
                'nombre' => 'Activo',
                'observaciones' => 'NA',
                'estado' => true,
            ],
            [
                'id' => 2,
                'nombre' => 'Cesado',
                'observaciones' => 'Trabajador desactivado por cese laboral.',
                'estado' => true,
            ],
            [
                'id' => 3,
                'nombre' => 'Descanso Médico',
                'observaciones' => 'Trabajador desactivado temporalmente.',
                'estado' => true,
            ],
            [
                'id' => 4,
                'nombre' => 'Descanso por Maternidad',
                'observaciones' => 'NA',
                'estado' => true,
            ],
            [
                'id' => 5,
                'nombre' => 'Vacaciones',
                'observaciones' => 'NA',
                'estado' => true,
            ],
            [
                'id' => 6,
                'nombre' => 'Licencia',
                'observaciones' => 'NA',
                'estado' => true,
            ],
        ]);
    }
}
