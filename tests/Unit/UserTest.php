<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class UserTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function user_can_generate_gravar_default_image_when_no_email_found_first_character_a()
    {
        $user = User::factory()->create([
            'name' => 'Mario',
            'email' => 'a@a.com'
        ]);

        $gravatarUrl = $user->getAvatar();
        $expected = 'https://www.gravatar.com/avatar/'.md5($user->email).'?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-1.png';

        $this->assertEquals($expected, $gravatarUrl);
        $response = Http::get($gravatarUrl);
        $this->assertTrue($response->successful());
    }

    /** @test */
    public function user_can_generate_gravar_default_image_when_no_email_found_first_character_z()
    {
        $user = User::factory()->create([
            'name' => 'Mario',
            'email' => 'z@z.com'
        ]);

        $gravatarUrl = $user->getAvatar();
        $expected = 'https://www.gravatar.com/avatar/'.md5($user->email).'?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-26.png';

        $this->assertEquals($expected, $gravatarUrl);
        $response = Http::get($gravatarUrl);
        $this->assertTrue($response->successful());

    }
}
