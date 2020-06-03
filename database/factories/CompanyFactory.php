<?php
use Faker\Generator as Faker;
$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'name'       => $faker->unique()->company,
        'is_active'  => true,
        'is_default' => false,
    ];
});