<?php

use Illuminate\Database\Seeder;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_documento')->insert([
            [
                'nombre' => 'Documento Nacional de Identidad',
                'abreviacion' => 'DNI',
                'observaciones' => 'Dni',
                'estado' => true,
            ],
            [
                'nombre' => 'Registro Unico de Contribuyente',
                'abreviacion' => 'RUC',
                'observaciones' => 'Para empresas',
                'estado' => true,
            ]
        ]);
    }
}
