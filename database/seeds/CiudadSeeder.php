<?php

use Illuminate\Database\Seeder;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ciudad')->insert([
            array('id' => 1, 'pais_id' => 1, 'nombre' => 'Arequipa', 'estado' => true),
            array('id' => 2, 'pais_id' => 1, 'nombre' => 'Lima', 'estado' => true),
            array('id' => 3, 'pais_id' => 1, 'nombre' => 'Tacna', 'estado' => true),
            array('id' => 4, 'pais_id' => 1, 'nombre' => 'Cusco', 'estado' => true),
            array('id' => 5, 'pais_id' => 1, 'nombre' => 'Moquegua', 'estado' => true),
            array('id' => 6, 'pais_id' => 1, 'nombre' => 'Ica', 'estado' => true)
        ]);
    }
}
