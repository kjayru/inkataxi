<?php

use Faker\Generator as Faker;
use App\Alert;
use App\AlertType;
use App\User;

$factory->define(App\Alert::class, function (Faker $faker) {
    return [
        'alert_type_id' => $faker->randomElement([Alert::ESTADO1, Alert::ESTADO2, Alert::ESTADO3]),
        'user_id' => $faker->numberBetween(3,50),
        'estado' => $faker->randomElement([AlertType::PENDIENTE, AlertType::ATENDIDO]),
        'latitud'=>'-12.20713380',
        'longitud'=>'-77.01207153',
    ];
});
