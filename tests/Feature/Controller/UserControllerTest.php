<?php

namespace Tests\Feature\Controller;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_get_users()
    {
        $qtdUsers = count(User::all());
        $response = $this->getJson('/users');
        $response->assertJsonCount($qtdUsers, 'data')
                    ->assertStatus(200);
    }

    public function test_get_user()
    {
        $user = User::first();
        $response = $this->getJson("user/{$user->id}");
        $response->assertStatus(200);
    }

    public function test_store_user()
    {
        $data = [
            'name' => 'leoteste',
            'email' => 'leoteste@email.com',
            'password' => '123456'
        ];
        $response = $this->postJson('/user', $data);
        $response->assertStatus(201);
    }

    public function test_update_user()
    {
        $data = [
            'name' => 'leoteste12',
            'email' => 'leoteste@email.com',
            'password' => '123456'
        ];
        $user = User::first();
        $response = $this->putJson("/user/{$user->id}", $data);
        $response->assertStatus(200);
    }

    public function test_delete_user()
    {
        $user = User::first();
        $response = $this->deleteJson("/user/{$user->id}");
        $response->assertStatus(204);
    }
}
