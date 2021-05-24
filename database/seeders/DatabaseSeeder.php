<?php

namespace Database\Seeders;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users= \App\Models\User::factory(5)->create();
    $conversations =\App\Models\Conversation::factory(5)->create();
       /* User::factory( 1)->create()->each(function($users) {
            $users->conversations()->sync(
                Conversation::all()->random(5),
                ['created_at'=>now(),'updated_at'=>now()]
            );
        });*/

        // create users with conversations
       Conversation::factory()->count(5)
            ->hasAttached(
               $users,
                ['created_at' => now(),
                    'updated_at' => now()]
            )
            ->create();
        Message::factory(40)->create();

    }
}
