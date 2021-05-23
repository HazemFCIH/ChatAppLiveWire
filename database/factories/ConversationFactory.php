<?php

namespace Database\Factories;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConversationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Conversation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->title,
            'uuid' => $this->faker->uuid,
            'user_id' => User::inRandomOrder()->first()->id,
            'last_massage_at' => $this->faker->dateTimeBetween($startDate = '-5 months', $endDate = 'now'),
        ];
    }
}
