<?php

use Illuminate\Database\Seeder;

class VinculoLaboralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vinculo_laboral')->insert([
            [
                'nombre' => 'RPH',
                'observaciones' => 'NA',
                'estado' => true,
            ],
            [
                'nombre' => 'Planilla',
                'observaciones' => 'NA',
                'estado' => true,
            ]
        ]);
    }
}
