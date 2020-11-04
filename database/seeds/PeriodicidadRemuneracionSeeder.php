<?php

use Illuminate\Database\Seeder;

class PeriodicidadRemuneracionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periodicidad_remuneracion')->insert([
            [
                'nombre' => 'Mensual',
                'cantidaddias' => 30,
                'estado' => true,
            ],
            [
                'nombre' => 'Quincenal',
                'cantidaddias' => 15,
                'estado' => true,
            ],
            [
                'nombre' => 'Semanal',
                'cantidaddias' => 7,
                'estado' => true,
            ],
            [
                'nombre' => 'Diario',
                'cantidaddias' => 1,
                'estado' => true,
            ]
        ]);
    }
}
