<?php

use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamento')->insert([
            array('nombre' => 'Amazonas', 'pais_id' => 1, 'estado' => true),
            array('nombre' => 'Áncash', 'pais_id' => 1, 'estado' => true),
            array('nombre' => 'Apurímac', 'pais_id' => 1, 'estado' => true),
            array('nombre' => 'Arequipa', 'pais_id' => 1, 'estado' => true),
            array('nombre' => 'Ayacucho', 'pais_id' => 1, 'estado' => true),
            array('nombre' => 'Cajamarca', 'pais_id' => 1, 'estado' => true),
            array('nombre' => 'Callao', 'pais_id' => 1, 'estado' => true),
            array('nombre' => 'Cusco', 'pais_id' => 1, 'estado' => true),
            array('nombre' => 'Huancavelica', 'pais_id' => 1, 'estado' => true),
            array('nombre' => 'Huánuco', 'pais_id' => 1, 'estado' => true),
            array('nombre' => 'Ica', 'pais_id' => 1, 'estado' => true),
            array('nombre' => 'Junín', 'pais_id' => 1, 'estado' => true),
            array('nombre' => 'La Libertad', 'pais_id' => 1, 'estado' => true),
            array('nombre' => 'Lambayeque', 'pais_id' => 1, 'estado' => true),
            array('nombre' => 'Lima', 'pais_id' => 1, 'estado' => true),
            array('nombre' => 'Loreto', 'pais_id' => 1, 'estado' => true),
            array('nombre' => 'Madre de Dios', 'pais_id' => 1, 'estado' => true),
            array('nombre' => 'Moquegua', 'pais_id' => 1, 'estado' => true),
            array('nombre' => 'Pasco', 'pais_id' => 1, 'estado' => true),
            array('nombre' => 'Piura', 'pais_id' => 1, 'estado' => true),
            array('nombre' => 'Puno', 'pais_id' => 1, 'estado' => true),
            array('nombre' => 'San Martín', 'pais_id' => 1, 'estado' => true),
            array('nombre' => 'Tacna', 'pais_id' => 1, 'estado' => true),
            array('nombre' => 'Tumbes', 'pais_id' => 1, 'estado' => true),
            array('nombre' => 'Ucayali', 'pais_id' => 1, 'estado' => true)
        ]);
    }
}
