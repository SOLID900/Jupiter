<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$sectionCount = 10;
    	$threadCount = 15;
    	$postCount = 20;
    	$userCount = 100;
		$voteCount = 50;
		$faker = Faker\Factory::create();

    	factory(App\User::class, $userCount)->create();
    	factory(App\Section::class, $sectionCount)->create();
    	factory(App\Thread::class, $sectionCount*$threadCount)->create();
    	//factory(App\Post::class, $sectionCount*$threadCount*$postCount)->create();

		foreach (range(1, $sectionCount*$threadCount*$postCount/1000) as $i)
		{
			$posts = [];
			$timestamp = Carbon\Carbon::now();
			foreach (range(1, 1000) as $j)
			{
				Log::info("J: " . $j);
				$posts[] = [
					'content' => implode("\r\n", $faker->paragraphs($nb = 3)),
					'thread_id' => $faker->numberBetween($min = 1, $max = $sectionCount*$threadCount),
					'user_id' => $faker->numberBetween($min = 1, $max = $userCount),
					'created_at' => $timestamp,
					'updated_at' => $timestamp,
				];
			}
			App\Post::insert($posts);
		}

		App\User::create([
			'name' => 'Tony',
			'email' => 'cyrilmoutot@gmail.com',
			'password' => 'secret',
		]);

		factory(App\PrivateMessage::class, 256)->create();

		//factory(App\Vote::class, $sectionCount*$threadCount*$postCount*$voteCount / 4)->create();
		//factory(App\Vote::class, $sectionCount*$threadCount*$postCount*$voteCount / 4)->create();
		//factory(App\Vote::class, $sectionCount*$threadCount*$postCount*$voteCount / 4)->create();
		//factory(App\Vote::class, $sectionCount*$threadCount*$postCount*$voteCount / 4)->create();



		foreach (range(1, $sectionCount*$threadCount*$postCount*$voteCount/1000) as $i)
		{
			$votes = [];
			$timestamp = Carbon\Carbon::now();
			foreach (range(1, 1000) as $j)
			{

				$votes[] = [
					'user_id' => $faker->numberBetween($min = 1, $max = $userCount),
					'post_id' => $faker->numberBetween($min = 1, $max = $sectionCount*$threadCount*$postCount),
					'sign' => $faker->boolean(),
					'created_at' => $timestamp,
					'updated_at' => $timestamp,
				];
			}
			App\Vote::insert($votes);
		}
    }
}
