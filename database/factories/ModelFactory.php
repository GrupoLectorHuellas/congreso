<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
use Illuminate\Support\Facades\Hash;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Congreso\Usuario::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'id' => "admin",
        'nacionalidad' => "Ecuatoriano",
        'nombres' => "Super",
        'apellidos' => "Admin",
        'genero' => "Masculino",
        'pais' => "Ecuador",
        'ciudad' => "Machala",
        'telefono' => "9999999999",
        'direccion' => "Machala",
        'titulo' => "Administrador",
        'path' => "noavatar.png",
        'email' => $faker->unique()->safeEmail,
        'id_roles' => 1,
        'id_cantones' => 181,
        'estado'=>1,
        //'genero'=>$faker->randomElement(['Femenino','Masculino']),
        'password' => bcrypt('admin123'),
    ];
});