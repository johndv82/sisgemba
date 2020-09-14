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
            array('id' => '01','nombre' => 'Amazonas'),
            array('id' => '02','nombre' => 'Áncash'),
            array('id' => '03','nombre' => 'Apurímac'),
            array('id' => '04','nombre' => 'Arequipa'),
            array('id' => '05','nombre' => 'Ayacucho'),
            array('id' => '06','nombre' => 'Cajamarca'),
            array('id' => '07','nombre' => 'Callao'),
            array('id' => '08','nombre' => 'Cusco'),
            array('id' => '09','nombre' => 'Huancavelica'),
            array('id' => '10','nombre' => 'Huánuco'),
            array('id' => '11','nombre' => 'Ica'),
            array('id' => '12','nombre' => 'Junín'),
            array('id' => '13','nombre' => 'La Libertad'),
            array('id' => '14','nombre' => 'Lambayeque'),
            array('id' => '15','nombre' => 'Lima'),
            array('id' => '16','nombre' => 'Loreto'),
            array('id' => '17','nombre' => 'Madre de Dios'),
            array('id' => '18','nombre' => 'Moquegua'),
            array('id' => '19','nombre' => 'Pasco'),
            array('id' => '20','nombre' => 'Piura'),
            array('id' => '21','nombre' => 'Puno'),
            array('id' => '22','nombre' => 'San Martín'),
            array('id' => '23','nombre' => 'Tacna'),
            array('id' => '24','nombre' => 'Tumbes'),
            array('id' => '25','nombre' => 'Ucayali')
        ]);
    }
}
