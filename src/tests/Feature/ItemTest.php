<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Authenticate a user and return a JWT token.
     *
     * @return string
     */
    protected function authenticate(): string
    {
        $user = User::factory()->create();
        return JWTAuth::fromUser($user);
    }

    /**
     * Test to ensure items can be listed.
     *
     * @return void
     */
    public function test_it_can_list_items(): void
    {
        // Arrange: Create items in the database
        Item::factory()->count(3)->create();

        // Act: Authenticate and make a GET request to the items endpoint
        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson('/api/items');

        // Assert: Verify the response status and item count
        $response->assertStatus(200)
                 ->assertJsonCount(3, 'data');
    }

    /**
     * Test to ensure a single item can be shown.
     *
     * @return void
     */
    public function test_it_can_show_a_single_item(): void
    {
        // Arrange: Create a single item in the database
        $item = Item::factory()->create();

        // Act: Authenticate and make a GET request to the item endpoint
        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson("/api/items/{$item->id}");

        // Assert: Verify the response status and item structure
        $response->assertStatus(200)
                 ->assertJson([
                     'success' => true,
                     'message' => 'Item encontrado com sucesso!',
                     'data' => [
                         'id' => $item->id,
                         'name' => $item->name,
                         'description' => $item->description,
                     ],
                 ]);
    }
}
