<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(BancoSeeder::class);
        //$this->call(CargoLaboralSeeder::class);
        $this->call(PaisSeeder::class);
        $this->call(DepartamentoSeeder::class);
        $this->call(ProvinciaSeeder::class);
        $this->call(DistritoSeeder::class);
        $this->call(EstadoCivilSeeder::class);
        $this->call(NivelEstudiosSeeder::class);
        //$this->call(PeriodicidadRemuneracionSeeder::class);
        //$this->call(RegimenPensionSeeder::class);
        //$this->call(RegimenSaludSeeder::class);
        //$this->call(TipoContratoSeeder::class);
        $this->call(TipoDocumentoSeeder::class);
        //$this->call(TipoTrabajadorAsigSeeder::class);
        //$this->call(VinculoLaboralSeeder::class);
        $this->call(EstadoTrabajadorSeeder::class);
    }
}
