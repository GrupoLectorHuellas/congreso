<?php

use Illuminate\Database\Seeder;
use Congreso\Video;

class VideoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::create([
            'url'=>'https://www.youtube.com/watch?v=97N2qaEnxJI',
            'descripcion'=>'Video de UTMACH desde el aire',

        ]);
    }
}
