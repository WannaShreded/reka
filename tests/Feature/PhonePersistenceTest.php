<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PhonePersistenceTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_persists_phone_number(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '+62 812 3456 7890',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));

        $user = User::where('email', 'test@example.com')->first();
        $this->assertEquals('+62 812 3456 7890', $user->phone);
    }

    public function test_profile_update_persists_phone_number(): void
    {
        $user = User::factory()->create([
            'phone' => '+62 111 222 333',
        ]);

        $response = $this->actingAs($user)->patch('/profile', [
            'name' => 'Test User Updated',
            'email' => $user->email,
            'phone' => '+62 999 888 777',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/profile');

        $user->refresh();
        $this->assertEquals('+62 999 888 777', $user->phone);
    }

    public function test_existing_user_without_phone_can_update_profile(): void
    {
        $user = User::factory()->create([
            'phone' => null,
        ]);

        $response = $this->actingAs($user)->patch('/profile', [
            'name' => 'Test User Updated',
            'email' => $user->email,
            'phone' => '+62 999 888 777',
        ]);

        $response->assertSessionHasNoErrors();
        $user->refresh();
        $this->assertEquals('+62 999 888 777', $user->phone);
    }
}
