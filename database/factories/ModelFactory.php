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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    static $login;
    static $role;

    return [
        'name' => $faker->name,
        'login' => $login ?: $login = 'achraf',
        'role' => $role ?: $role = 'op',
        'password' => $password ?: $password = bcrypt('010203'),
    ];
});
