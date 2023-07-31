<?php

namespace Tests\Feature\Api\Controller;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex(): void
    {
        $name = 'Test User';
        $email = 'test@test.com';
        $user = User::factory()->create([
            'name' => $name,
            'email' => $email,
        ]);

        $response = $this->get(route('user.index'));
        $response->assertSuccessful();
        $response->assertJson([
            'data' => [
                [
                    'id' => $user->id,
                    'name' => $name,
                    'email' => $email,
                ],
            ],
        ]);
    }

    public function testStore(): void
    {
        $request = [
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => 'password123',
        ];

        $response = $this->post(route('user.store'), $request);
        $response->assertSuccessful();
        $this->assertDatabaseHas('users', [
            'name' => $request['name'],
            'email' => $request['email'],
        ]);
    }

    public function testShow(): void
    {
        $name = 'Test User';
        $email = 'test@test.com';
        $user = User::factory()->create([
            'name' => $name,
            'email' => $email,
        ]);

        $response = $this->get(route('user.show', ['id' => $user->id]));
        $response->assertSuccessful();
        $response->assertJson([
            'data' => [
                'id' => $user->id,
                'name' => $name,
                'email' => $email,
            ],
        ]);
    }

    public function testUpdate(): void
    {
        $user = User::factory()->create();
        $request = [
            'name' => 'Test User',
            'email' => 'newmail@test.com',
        ];

        $response = $this->put(route('user.update', ['id' => $user->id]), $request);
        $response->assertSuccessful();
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => $request['name'],
            'email' => $request['email'],
        ]);
    }

    public function testDelete(): void
    {
        $user = User::factory()->create();
        $response = $this->delete(route('user.delete', ['id' => $user->id]));
        $response->assertSuccessful();
        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }
}
