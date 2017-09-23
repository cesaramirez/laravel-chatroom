<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\ChatPage;
use Tests\DuskTestCase;

class ChatTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test A user can send a message.
     */
    public function a_user_can_send_a_message()
    {
        $user = factory(User::class)->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                    ->visit(new ChatPage())
                    ->typeMessage('Hi there!')
                    ->sendMessage()
                    ->assertInputValue('@body', '')
                    ->with('#messages', function ($messages) use ($user) {
                        $messages->assertSee('Hi there!')
                                 ->assertSee($user->name);
                    });
        });
    }
}
