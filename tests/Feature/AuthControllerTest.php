<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testUserShouldNotAuthenticate()
    {
        $payload = [
            "email" => "hey@dev.com",
            "password" => "secret123"
        ];

        $request = $this->post('api/login', $payload);

        $request->assertStatus(401);
        $request->assertJson(['status'=> 'error', 'message'=> 'Unauthorized']);
    }

    public function testUserCanAuthenticate()
    {
        $user = User::factory()->create([
            'password' => bcrypt('secret123'),
        ]);

        $payload = [
            'email' => $user->email,
            'password' => 'secret123'
        ];

        $request = $this->post('api/login', $payload);

        User::find($user->id)->delete();

        $request->assertStatus(200);
        $request->assertJsonStructure(['status', 'user', 'authorization']);
    }


}
