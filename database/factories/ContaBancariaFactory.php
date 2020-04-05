<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\conta_bancaria;
use Faker\Generator as Faker;

$factory->define(conta_bancaria::class, function (Faker $faker) {
    return [
        'descricao' => $faker->sentence,
        'saldo_inicial' => $faker->sentence,
    ];
});
