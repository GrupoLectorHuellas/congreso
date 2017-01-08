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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Congreso\Usuario::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'id' => "admin",
        'nombres' => "Super",
        'apellidos' => "Admin",
        'pais' => "Ecuador",
        'ciudad' => "Machala",
        'telefono' => "9999999999",
        'direccion' => "Machala",
        'email' => $faker->unique()->safeEmail,
        'id_roles' => 1,
        'estado'=>1,
        //'genero'=>$faker->randomElement(['Femenino','Masculino']),
        'password' => $password ?: $password = bcrypt('admin123'),
    ];
});
