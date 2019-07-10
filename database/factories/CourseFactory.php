<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'course_name'=> $faker->sentence,
        'course_description'=> $faker->text,
        'course_owner'=> $faker->name,
        'text'=> $faker->sentence
    ];
});
