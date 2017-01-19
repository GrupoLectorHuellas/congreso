<?php

use Illuminate\Database\Seeder;
use Congreso\Categoria;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre'=>'Seguridad Infórmatica',
            'descripcion'=>'Integridad y  privacidad de la información',
            'estado'=>'1',

        ]);
    }
}
