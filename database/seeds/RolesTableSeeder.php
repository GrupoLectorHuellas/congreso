<?php

use Illuminate\Database\Seeder;
use Congreso\Rol;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create([
            'nombre'=>'SuperAdmin',
            'descripcion'=>'Usuario con el mayor de los privilegios en el sistema',

        ]);
        Rol::create([
            'nombre'=>'Admin',
            'descripcion'=>'Usuario con altos privilegios pero menores que el SuperAdmin  ',

        ]);
        Rol::create([
            'nombre'=>'Estandar',
            'descripcion'=>'Usuario normales registrados en el sistema',

        ]);
    }
}
