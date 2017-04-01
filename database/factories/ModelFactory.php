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
use Carbon\Carbon;

$cities = Countries::where('name.common', 'Tunisia')->first()->states->pluck('name', 'postal')->toarray();

/** @var \Illuminate\Database\Eloquent\Factory $factory */


$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    static $login;
    $showroomId = $faker->numberBetween(1, 10);

    return [
        'fullname' => $faker->name,
        'email' => $faker->email,
        'showroom_id' => $showroomId,
        'username' => $login,
        'password' => $password ?: $password = bcrypt('010203'),
    ];
});


$factory->define(App\Role::class, function (Faker\Generator $faker) {
    static $title;
    static $fulltitle;

    return [
        'title' => $title,
        'fulltitle' => $fulltitle,
    ];
});

$factory->define(App\Showroom::class, function (Faker\Generator $faker) {
    return [
        'city' => $faker->city,
    ];
});



$factory->define(App\Client::class, function (Faker\Generator $faker) use ($cities) {
    return [
        'firstname' => $faker->firstName,
        'lastname'  => $faker->lastName,
        'email'     => $faker->email,
        'phone'     => $faker->e164PhoneNumber,
        'address'   => $faker->address,
        'city'      => $faker->randomElement($cities),
        'birthdate' => $faker->date($format = 'Y-m-d', $max = '-20 years'),
    ];
});

$factory->define(App\Appointment::class, function (Faker\Generator $faker) {
    $startDate = Carbon::createFromTimeStamp($faker->dateTimeBetween('-10 weeks', '+5 weeks')->getTimestamp());
    $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $startDate)->addHours(2);
    $status = $faker->randomElement(array('done', 'rescheduled', 'pending'));
    if ($endDate > Carbon::now()) {
        $status = 'pending';
    }
    
    return [
        'title' => $faker->name,
        'status'  =>  $status,
        'notes'     => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'client_id'     => $faker->numberBetween(1, 60),
        'showroom_id'   => $faker->numberBetween(1, 10),
        'start_at'      => $startDate,
        'end_at'     => $endDate,
    ];
});
