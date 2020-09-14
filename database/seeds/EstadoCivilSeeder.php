<?php

use Illuminate\Database\Seeder;

class EstadoCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado_civil')->insert([
            [
                'nombre' => 'Soltero',
                'observaciones' => 'NA',
                'estado' => 1,
            ],
            [
                'nombre' => 'Casado',
                'observaciones' => 'NA',
                'estado' => 1,
            ]
        ]);
    }
}
