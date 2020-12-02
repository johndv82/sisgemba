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
                'abreviacion' => 'D.N.I.',
                'observaciones' => 'Dni',
                'estado' => true,
            ],
            [
                'nombre' => 'Registro Unico de Contribuyente',
                'abreviacion' => 'R.U.C.',
                'observaciones' => 'Para empresas',
                'estado' => true,
            ],
            [
                'nombre' => 'Permiso Temporal de Permanencia',
                'abreviacion' => 'P.T.P.',
                'observaciones' => 'NA',
                'estado' => true,
            ],
            [
                'nombre' => 'Carnet de Extranjería',
                'abreviacion' => 'C.E.',
                'observaciones' => 'Para empresas',
                'estado' => true,
            ]
        ]);
    }
}
