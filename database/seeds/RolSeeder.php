<?php

use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rol')->insert([
            [
                'id' => 1,
                'nombre' => 'admin',
                'observaciones' => 'administrador',
                'estado' => true,
            ],
            [
                'id' => 2,
                'nombre' => 'normal',
                'observaciones' => 'Rol para usuario normal',
                'estado' => true,
            ]
        ]);
    }
}
