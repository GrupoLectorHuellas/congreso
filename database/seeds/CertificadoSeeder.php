<?php

use Illuminate\Database\Seeder;
use Congreso\Imagen;

class CertificadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          Imagen::create([
            'path'=>'certificado.jpg',
            'descripcion'=>'Módelo actual del certificado',

        ]);
    }
}
