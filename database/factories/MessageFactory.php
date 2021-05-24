<?php

namespace Database\Factories;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'conversation_id' =>Conversation::inRandomOrder()->first()->id,
            'user_id' =>Conversation::whereId(User::inRandomOrder()->first()->id)->with('users')->first()->id,
            'body' =>$this->faker->sentence,
        ];
    }
}
