<?php

use Illuminate\Database\Seeder;

class FollowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = App\User::all();
        for ($i = 1; $i <= 10; $i++) {
            $users->each(function ($user) {
                $follow = factory(\App\Follow::class)->make();
                $follow->user()->associate($user);
                $follow->save();
            });
        }
    }
}
