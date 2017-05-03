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
$factory->define(\HttpOz\Roles\Models\Role::class, function (Faker\Generator $faker) {

    $role = $faker->word;

    return [
        'name' => $role,
        'slug' => strtolower($role),
        'description' => $faker->sentence,
        'group' => 'default'
    ];
});


$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
    
});

$factory->define(App\Package::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'description' => $faker->sentence,
        'price' => $faker->randomNumber
    ];
    
});

$factory->define(App\Employer::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
        'user_id' => function() {
            return factory('App\User')->create()->id;
        },
        'description' => $faker->sentence
    ];
    
});

$factory->define(App\Payment::class, function (Faker\Generator $faker) {

    $user = factory('App\User')->create();
    $package = factory('App\Package')->create();

    return [
        'user_id' => $user->id,
        'package_id' => $package->id,
        'amount' => $package->price,
        'listing_count' => 1
    ];
    
});

$factory->define(App\Job::class, function (Faker\Generator $faker) {
    
    $title = $faker->sentence;

    return [
        'title' => $title,
        'category_id' => function() {
            return factory('App\Category')->create()->id;
        },
        'slug' => str_slug($title, '-'),
        'description' => $faker->paragraph
    ];

});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    
    $category = $faker->word;

    return [
        'title' => $category,
        'slug' => $category,
        'description' => $faker->paragraph
    ];

});

$factory->define(App\DealType::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->sentence
    ];

});

$factory->define(App\Deal::class, function (Faker\Generator $faker) {

    return [
        'deal_type_id' => function() {
            return factory('App\DealType')->create()->id;
        },
        'package_id' => function() {
            return factory('App\Package')->create()->id;
        },
        'name' => $faker->word,
        'description' => $faker->sentence,
        'min' => $faker->numberBetween(1, 5),
        'max' => $faker->numberBetween(5, 10),
        'price' => $faker->randomNumber
    ];

});

