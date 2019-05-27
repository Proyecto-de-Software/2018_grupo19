<?php

use Faker\Generator as Faker;

$factory->define(\App\Consulta::class, function (Faker $faker) {
    return [
        'fecha' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'articulacion_con_instituciones' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'internacion' => $faker->boolean,
        'diagnostico' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'observaciones' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'paciente_id' => $faker->numberBetween($min = 1, $max = 50),
        'motivo_consulta_id' => $faker->numberBetween($min = 1, $max = 6),
        'derivacion_id' => $faker->numberBetween($min = 1, $max = 4),
        'tratamiento_farmacologico_id' => $faker->numberBetween($min = 1, $max = 3),
        'acompanamiento_id' => $faker->numberBetween($min = 1, $max = 7),
    ];
});
