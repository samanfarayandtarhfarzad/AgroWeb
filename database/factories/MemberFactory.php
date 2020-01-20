<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Member::class, function (Faker $faker) {
    return [
        'username' => $faker->text(10),
        'phone' => '09023824526',
        'email' => $faker->text(20),
        'password' => '12345678',
        'firstname' => $faker->text(10),
        'lastname' => $faker->text(10),
        'roleid' => '1',
        'zipcode' => '1234554321',
        'gender' => '1',
        'birthdate' => '2020-01-14',
        'lastlogin' => '2020-01-14 11:26:29',
        'status' => '1'
    ];
});
