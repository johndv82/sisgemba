<?php

use Illuminate\Database\Seeder;

class TipoContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_contrato')->insert([
            [
                'nombre' => 'Por inicio o incremento de actividad',
                'observaciones' => 'NA',
                'estado' => true,
            ],
            [
                'nombre' => 'A plazo Indeterminado',
                'observaciones' => 'NA',
                'estado' => true,
            ],
            [
                'nombre' => 'Obra determinada o serv. Especifico',
                'observaciones' => 'NA',
                'estado' => true,
            ],
            [
                'nombre' => 'A tiempo parcial',
                'observaciones' => 'NA',
                'estado' => true,
            ]
        ]);
    }
}
