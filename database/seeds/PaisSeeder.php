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
            array('id' => 1, 'nombre' => 'Perú', 'estado' => true)
        ]);
    }
}
