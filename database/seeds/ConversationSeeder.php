<?php

use Illuminate\Database\Seeder;

class ConversationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Conversation::class, 5)->create()
/*            ->each(function ($u) {
            $u->posts()->save(factory(App\Conversation::class)->make());
        })*/;
    }
}
