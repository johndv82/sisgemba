<?php

use Illuminate\Database\Seeder;

class RegimenPensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regimen_pension')->insert([
            [
                'nombre' => 'AFP Integra, del grupo Sura',
                'abreviacion' => 'Integra',
                'observaciones' => 'NA',
                'estado' => true,
            ],
            [
                'nombre' => 'AFP Prima, del Grupo Crédito',
                'abreviacion' => 'Prima',
                'observaciones' => 'NA',
                'estado' => true,
            ],
            [
                'nombre' => 'AFP Profuturo, del Grupo Scotiabank',
                'abreviacion' => 'Profuturo',
                'observaciones' => 'NA',
                'estado' => true,
            ],
            [
                'nombre' => 'AFP Habitat, del grupo económico chileno Inversiones la Construcción',
                'abreviacion' => 'Habitat',
                'observaciones' => 'NA',
                'estado' => true,
            ],
            [
                'nombre' => 'Oficina de Normalización Previsional',
                'abreviacion' => 'ONP',
                'observaciones' => 'NA',
                'estado' => true,
            ]
        ]);
    }
}
