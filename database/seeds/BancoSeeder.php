<?php

use Illuminate\Database\Seeder;

class BancoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banco')->insert([
            [
                'nombre' => 'BBVA',
                'observaciones' => 'BBVA Banco Continental',
                'estado' => true,
            ],
            [
                'nombre' => 'BCP',
                'observaciones' => 'Banco de Crédito del Perú',
                'estado' => true,
            ],
            [
                'nombre' => 'Interbank',
                'observaciones' => 'Interbank',
                'estado' => true,
            ]
        ]);
    }
}
