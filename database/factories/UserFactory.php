<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});



$factory->define(\App\top_category::class, function (Faker $faker) {
    return [
        'category_name' => $faker->name,
    ];
});


$factory->define(\App\middle_category::class, function (Faker $faker) {
    return [
        'top_cat_id' => rand(1,10),
        'category_name' => $faker->name,
    ];
});

$factory->define(\App\end_category::class, function (Faker $faker) {
    return [
        'top_cat_id' => rand(1,10),
        'middle_cat_id' => rand(1,20),
        'category_name' => $faker->name,
    ];
});


$factory->define(\App\brand::class, function (Faker $faker) {
    return [
        'brand_name' => $faker->name,
    ];
});



$factory->define(\App\color::class, function (Faker $faker) {
    return [
        'color_name' => $faker->colorName,
    ];
});

$factory->define(\App\size::class, function (Faker $faker) {
    return [
        'size_name' => $faker->name,
    ];
});


$factory->define(\App\product::class, function (Faker $faker) {
    return [
        'product_name' => $faker->name,
        'product_old_price' => rand(1,500),
        'product_new_price' => rand(1,500),
        'top_cat_id' => rand(3,11),
        'mid_cat_id' => rand(3,27),
        'end_cat_id' => rand(3,27),
        'brand_id' => rand(2,21),
        'main_image' => $faker->imageUrl,
        'sort_des' => $faker->paragraph,
        'long_des' => $faker->paragraph,
        'status' => 1,
    ];
});


$factory->define(\App\blog_category::class, function (Faker $faker) {
    return [
        'category_name' => $faker->name,
    ];
});



$factory->define(\App\blog::class, function (Faker $faker) {
    return [
        'blog_cat_id' => rand(3,12),
        'blog_title' => $faker->title,
        'blog_des' => $faker->paragraph,
        'blog_image' => $faker->imageUrl,
    ];
});
