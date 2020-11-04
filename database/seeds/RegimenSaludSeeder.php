<?php

use Illuminate\Database\Seeder;

class RegimenSaludSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regimen_salud')->insert([
            [
                'nombre' => 'EsSalud',
                'abreviacion' => 'EsSalud',
                'observaciones' => 'NA',
                'estado' => true,
            ],
            [
                'nombre' => 'Plan de Salud',
                'abreviacion' => 'EPS',
                'observaciones' => 'NA',
                'estado' => true,
            ]
        ]);
    }
}
