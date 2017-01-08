<?php

use Illuminate\Database\Seeder;
Use Congreso\Usuario;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->createSuperAdmin();
        factory(Usuario::class,1)->create();
    }

    private function createSuperAdmin(){
        factory(Usuario::class,1)->create();

    }
}
