<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
    Консольные команды для запуска фабрики постов:
    
    php artisan tinker
    factory(App\Post::class, 5)->create();
    exit
*/

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'       => 'Текст заголовка: ' . $faker->sentence,
        'description' => 'Текст описания: ' . $faker->sentence,
        'content'     => 'Текст контента: ' . $faker->sentence,
        'image'       => 'photo' . rand(1, 4) . '.jpg',
        'date'        => '07/06/23',
        'views'       => $faker->numberBetween(0, 5000),
        'category_id' => 1,
        'user_id'     => 1,
        'status'      => 1,
        'is_featured' => 0,
    ];
});
