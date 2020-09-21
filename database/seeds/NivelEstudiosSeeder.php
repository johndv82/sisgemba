<?php

use Illuminate\Database\Seeder;

class NivelEstudiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nivel_estudios')->insert([
            [
                'nombre' => 'Secundaria Completa',
                'observaciones' => 'NA',
                'estado' => 1,
            ],
            [
                'nombre' => 'Técnico Superior',
                'observaciones' => 'NA',
                'estado' => 1,
            ],
            [
                'nombre' => 'Universitario',
                'observaciones' => 'NA',
                'estado' => 1,
            ]
        ]);
    }
}
