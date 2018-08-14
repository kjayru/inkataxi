<?php

use Faker\Generator as Faker;
use App\Role;
use App\User;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'role_id'=>$faker->randomElement([Role::ADMIN, Role::CLIENTE,Role::CONDUCTOR]),
        'name' => $faker->name,
        'lastname'=>$faker->lastname,
        'email' => $faker->unique()->safeEmail,
        'avatar'=>$faker->imageUrl($width = 640, $height = 480),
        'dni' => str_random(8),
        'phone'=> $faker->phoneNumber,
        'cellphone'=> $faker->phoneNumber,
        'id_fb' =>str_random(30),
        'tokenandroid'=>'',
        'tokenapple'=>'',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'pathimg'=>$faker->imageUrl($width = 320, $height = 240),
        'status'=>$faker->randomElement([User::ACTIVO, User::DESACTIVO]),
        'habilitado'=>'1',
        'settings'=>'{"locale":"es"}'
        ,
    ];
});
