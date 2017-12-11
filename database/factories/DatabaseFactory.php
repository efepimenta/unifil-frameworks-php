<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->text,
        'status' => rand(0, 100),
        'user_id' => rand(1, 11)
    ];
});
