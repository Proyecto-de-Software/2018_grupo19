<?php

use Faker\Generator as Faker;
use App\Paciente;

$factory->define(\App\Paciente::class, function (Faker $faker) {
    $id = $faker->numberBetween($min = 1, $max = 12);

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
        'localidad_id' => $id,
        'region_sanitaria_id' => $id,
        'genero_id' => $faker->numberBetween($min = 1, $max = 3),
        'tipo_doc_id' => $faker->numberBetween($min = 1, $max = 5),
        'obra_social_id' => $faker->numberBetween($min = 1, $max = 21),
    ];
});
