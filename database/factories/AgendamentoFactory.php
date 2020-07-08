<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Agendamento;
use Faker\Generator as Faker;

$factory->define(Agendamento::class, function (Faker $faker) {
    $sexo = Agendamento::sexoOptions(); 
    $regimento = ['Antigo','Novo']; 
    $nivel = ['Mestrado','Doutorado']; 
    $orientador_votante = ['Sim','Nao']; 
    return [
        'codpes' => $faker->posgraduacao,
        'regimento' => $regimento[array_rand($regimento)],
        'orientador_votante' => $orientador_votante[array_rand($orientador_votante)],
        'sexo' => $sexo[array_rand($sexo)],
        'nivel' => $nivel[array_rand($nivel)],
        'titulo' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'area_programa' => $faker->numberBetween($min = 4, $max = 32),
        'data_horario' => $faker->dateTime,
        'sala' => $faker->numberBetween($min = 4, $max = 11),
        'orientador' => $faker->docente, 
    ];
});