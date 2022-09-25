<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->insert([
            [
                'id' => 1,
                'nombres' => 'nombre admin',
                'apellidos' => 'apellidos admin',
                'dni'=>'88888888',
                'email' => 'admin@admin.com',
                'rol_id' => 1,
                'name' => 'admin',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
                'estado' => true,
            ]
        ]);
    }
}
