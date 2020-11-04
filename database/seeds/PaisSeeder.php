<?php

use Illuminate\Database\Seeder;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pais')->insert([
            array('id' => 1, 'nombre' => 'Perú', 'estado' => true),
            array('id' => 2, 'nombre' => 'Venezuela', 'estado' => true),
            array('id' => 3, 'nombre' => 'Chile', 'estado' => true),
            array('id' => 4, 'nombre' => 'Bolivia', 'estado' => true),
            array('id' => 5, 'nombre' => 'Colombia', 'estado' => true),
        ]);
    }
}
