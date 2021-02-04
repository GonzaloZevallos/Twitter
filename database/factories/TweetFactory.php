<?php

namespace Database\Factories;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TweetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tweet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->text(200),
            'author_id' => User::factory(),
            'parent_id' => null,
            'created_at' => Carbon::now()->subMinutes(rand(1, 55))
        ];
    }

    public function response() {
        return $this->state([
            'tweet_id' => Tweet::all()->random()->id
        ]);
    }
}
