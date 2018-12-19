<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FollowTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSave()
    {
        $user = factory(\App\User::class)->make();
        $user->save();
        $follow = factory(\App\Follow::class)->make();
        $follow->user()->associate($user);
        $this->assertTrue($follow->save());
        //$this->assertTrue(true);

    }
}
