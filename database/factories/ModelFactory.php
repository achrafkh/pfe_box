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

    return [
        'fullname' => $faker->name,
        'email' => $faker->email,
        'username' => $login,
        'password' => $password ?: $password = bcrypt('010203'),
    ];
});


$factory->define(App\Role::class, function (Faker\Generator $faker) {
    static $title;

    return [
        'title' => $title,
    ];
});

$factory->define(App\Showroom::class, function (Faker\Generator $faker) {
    return [
        'city' => $faker->city,
    ];
});



$factory->define(App\Client::class, function (Faker\Generator $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname'  => $faker->lastName,
        'email'     => $faker->email,
        'phone'     => $faker->e164PhoneNumber,
        'address'   => $faker->address,
        'city'      => $faker->city,
        'state'     => $faker->state,
        'birthdate' => $faker->date($format = 'Y-m-d', $max = '-20 years'),
    ];
});
