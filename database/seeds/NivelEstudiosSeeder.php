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
                'estado' => true,
            ],
            [
                'nombre' => 'Técnico Superior',
                'observaciones' => 'NA',
                'estado' => true,
            ],
            [
                'nombre' => 'Universitario',
                'observaciones' => 'NA',
                'estado' => true,
            ]
        ]);
    }
}
