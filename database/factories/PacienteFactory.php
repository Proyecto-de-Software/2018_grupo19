<?php

use Faker\Generator as Faker;
use App\Paciente;

$factory->define(\App\Paciente::class, function (Faker $faker) {
    return [
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName,
        'lugar_nac' => $faker->country,
        'fecha_nac' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'domicilio' => $faker->address,
        'tiene_documento' => true,
        'documento' => $faker->numberBetween($min = 10000000, $max = 50000000),
        'telefono' => $faker->e164PhoneNumber,
        'nro_historia_clinica' => $faker->numberBetween($min = 100000, $max = 999999),
        'nro_carpeta' => $faker->numberBetween($min = 100000, $max = 999999),
        'localidad_id' => 1,
        'region_sanitaria_id' => 1,
        'genero_id' => $faker->numberBetween($min = 1, $max = 3),
        'tipo_doc_id' => 1,
        'obra_social_id' => 1,
    ];
});
