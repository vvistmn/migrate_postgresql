<?php

use Faker\Generator as Faker;

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

$factory->define(App\FileRole::class, function (Faker $faker) {
    return [
        'fr_name' => $faker->name,
    ];
});

$factory->define(App\FileExtension::class, function (Faker $faker) {
    return [
        'fe_name' => $faker->name,
    ];
});

// $factory->define(App\DocumentType::class, function (Faker $faker) {
//     return [
//         'fe_name' => $faker->name,
//     ];
// });

// $factory->define(App\Source::class, function (Faker $faker) {
//     return [
//         'source_name' => $faker->name,
//         'source_descr' => $faker->text(),
//         'source_actual_date' => $faker->dateTimeBetween('now'),
//     ];
// });

// $factory->define(App\Attr::class, function (Faker $faker) {
//     return [
//         'attr_name' => $faker->name,
//         'attr_code' => $faker->name,
//         'attr_value_type' => $faker->name,
//         'attr_is_etalon' => $faker->name,
//         'attr_descr' => $faker->text(),
//         'parent_attr_id' => $faker->numberBetween(1, 5),
//         'etalon_attr_id' => $faker->numberBetween(1, 5),
//     ];
// });
