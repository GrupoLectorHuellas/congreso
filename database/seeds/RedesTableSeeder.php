<?php

use Illuminate\Database\Seeder;
use Congreso\Redes;

class RedesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Redes::create([
            'url'=>'https://www.facebook.com/groups/125050704246861/?fref=ts',
            'descripcion'=>'Red social para facebook',

        ]);

        Redes::create([
            'url'=>'https://twitter.com/utmach1969',
            'descripcion'=>'Red social para Twitter',

        ]);

        Redes::create([
            'url'=>'https://www.instagram.com/uaic_utmach/',
            'descripcion'=>'Red social para instagram',

        ]);
    }
}
