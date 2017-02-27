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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = 'secret',
        'remember_token' => str_random(10),
		'avatar' => 'https://unsplash.it/' . rand(400, 600) . '/' . rand(400, 600)
    ];
});

$factory->define(App\Section::class, function (Faker\Generator $faker) {
	return [
		'name' => $faker->word,
		'description' => $faker->sentence($nbWords = 6, $variableNbWords = true)
	];
});

$factory->define(App\Thread::class, function (Faker\Generator $faker) {
	$sectionCount = 10;
	return [
		'name' => $faker->sentence($nbWords = 4),
		'section_id' => $faker->numberBetween($min = 1, $max = $sectionCount),
	];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
	$sectionCount = 10;
	$threadCount = 15;
	$userCount = 100;
	return [
		'content' => implode("\r\n", $faker->paragraphs($nb = 3)),
		'thread_id' => $faker->numberBetween($min = 1, $max = $sectionCount*$threadCount),
		'user_id' => $faker->numberBetween($min = 1, $max = $userCount),
	];
});

$factory->define(App\PrivateMessage::class, function (Faker\Generator $faker) {
	$userCount = 100;
	return [
		'title' => $faker->sentence($nbWords = 4),
		'content' => implode("\r\n", $faker->paragraphs($nb = 3)),
		'author_id' => $faker->numberBetween($min = 1, $max = $userCount),
		'recipient_id' => $userCount+1,
	];
});

$factory->define(App\Vote::class, function (Faker\Generator $faker) {
	$sectionCount = 10;
	$threadCount = 15;
	$postCount = 20;
	$userCount = 100;
	return [
		'user_id' => $faker->numberBetween($min = 1, $max = $userCount),
		'post_id' => $faker->numberBetween($min = 1, $max = $sectionCount*$threadCount*$postCount),
		'sign' => $faker->boolean(),
	];
});
