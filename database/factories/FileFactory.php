<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\File;
use Faker\Generator as Faker;


$factory->define(File::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(6, true),
        'url'=> $faker->url()
    ];
});
