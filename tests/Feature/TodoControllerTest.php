<?php

namespace Tests\Feature;

use App\Models\Todo;
use App\Models\User;
use Tests\TestCase;

class TodoControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function testReturnAllTodo()
    {
        Todo::factory()->count(3)->create();

        $user = User::factory()->make();

        $request = $this->actingAs($user, 'api')->get(route('todos'));

        $request->assertOk();
    }

}
