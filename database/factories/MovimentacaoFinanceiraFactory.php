<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\movimentacao_financeira;
use Faker\Generator as Faker;

$factory->define(movimentacao_financeira::class, function (Faker $faker) {
    return [
        'descricao' => $faker->sentence,
        'valor' => $faker->sentence,
        'tipo_movimentacao' => $faker->sentence,
        'data_movimentacao' => $faker->sentence,
        'id_conta_bancaria' => $faker->sentence
    ];
});
