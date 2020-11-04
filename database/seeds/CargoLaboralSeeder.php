<?php

use Illuminate\Database\Seeder;

class CargoLaboralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('cargo_laboral')->insert([
            ['nombre' => 'Tecnico de Soporte', 'observaciones' => 'NA', 'estado' => true],
            ['nombre' => 'Supervisor de Soporte', 'observaciones' => 'NA', 'estado' => true],
            ['nombre' => 'Administrador de infraestructura', 'observaciones' => 'NA', 'estado' => true],
            ['nombre' => 'Jefe de Mesa de Ayuda', 'observaciones' => 'NA', 'estado' => true],
            ['nombre' => 'Analista de Sistemas Junior', 'observaciones' => 'NA', 'estado' => true],
            ['nombre' => 'Analista de Sistemas Semi senior', 'observaciones' => 'NA', 'estado' => true],
            ['nombre' => 'Analista de Sistemas Senior', 'observaciones' => 'NA', 'estado' => true],
            ['nombre' => 'Analista QA Junior', 'observaciones' => 'NA', 'estado' => true],
            ['nombre' => 'Analista QA Semi senior', 'observaciones' => 'NA', 'estado' => true],
            ['nombre' => 'Analista QA Senior', 'observaciones' => 'NA', 'estado' => true],
            ['nombre' => 'Programador Junior', 'observaciones' => 'NA', 'estado' => true],
            ['nombre' => 'Programador Junior', 'observaciones' => 'NA', 'estado' => true],
            ['nombre' => 'Programador Junior', 'observaciones' => 'NA', 'estado' => true],
            ['nombre' => 'Analista de Procesos Junior', 'observaciones' => 'NA', 'estado' => true],
            ['nombre' => 'Analista de Procesos Semi senior', 'observaciones' => 'NA', 'estado' => true],
            ['nombre' => 'Analista de Procesos Senior', 'observaciones' => 'NA', 'estado' => true],
            ['nombre' => 'Administrador de BD', 'observaciones' => 'NA', 'estado' => true],
            ['nombre' => 'Jefe de Proyecto', 'observaciones' => 'NA', 'estado' => true],
            ['nombre' => 'Gerente de Proyecto', 'observaciones' => 'NA', 'estado' => true],
            ['nombre' => 'Ejecutivo de Ventas', 'observaciones' => 'NA', 'estado' => true],
            ['nombre' => 'Coordinador de RRHH', 'observaciones' => 'NA', 'estado' => true],
            ['nombre' => 'Tesorero', 'observaciones' => 'NA', 'estado' => true],
        ]);
    }
}
