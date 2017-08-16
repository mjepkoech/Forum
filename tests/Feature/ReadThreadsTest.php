<?php

namespace Tests\Feature;

use App\Reply;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
class ThreadsTest extends TestCase
{
    use DatabaseMigrations;

    public function setup()
{
    parent::setup();

    $this->thread = factory('App\Thread')->create();
}
    /** @test */
    public function a_user_can_view_all_threads()
    {
        $response = $this->get('/threads')

        ->assertSee($this->thread->title);

    }

    /** @test */
    public function a_user_can_read_single_thread()
    {
        $this->get('/threads/' .$this->thread->id)

        ->assertSee($this->thread->title);
    }

    /** @test */
    function a_user_can_read_replies_associated_with_a_thread()
    {
        $reply  = factory('App\Reply')
            ->create(['thread_id' => $this->thread->id]);

         $this->get('/threads/' .$this->thread->id)
        ->assertSee($reply->body);
    }
}
