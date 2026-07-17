<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShopWorkflowTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_requires_a_size_before_adding_to_cart(): void
    {
        $response = $this->post('/cart/add', [
            'product_slug' => 'linen-blouse',
            'quantity' => 1,
            'color' => 'Sand',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['size']);
    }

    public function test_guests_are_redirected_to_login_when_trying_to_checkout(): void
    {
        $response = $this->get('/checkout');

        $response->assertRedirect('/login');
        $response->assertSessionHas('checkout_required');
    }

    public function test_support_page_is_available(): void
    {
        $response = $this->get('/support');

        $response->assertOk();
    }

    public function test_dashboard_requires_authentication(): void
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }

    public function test_guest_cannot_access_customer_pages(): void
    {
        $response = $this->get('/orders');

        $response->assertRedirect('/login');
    }

    public function test_customer_cannot_access_admin_dashboard(): void
    {
        $user = \App\Models\User::factory()->create([
            'role' => 'customer',
        ]);

        $response = $this->actingAs($user)->get('/admin-dashboard');

        $response->assertRedirect('/dashboard');
    }

    public function test_admin_can_access_admin_dashboard(): void
    {
        $user = \App\Models\User::factory()->create([
            'role' => 'admin',
        ]);

        $response = $this->actingAs($user)->get('/admin-dashboard');

        $response->assertOk();
    }

    public function test_search_page_shows_matching_products(): void
    {
        $response = $this->get('/search?query=linen');

        $response->assertOk();
        $response->assertSee('Linen Blouse');
    }

    public function test_settings_page_requires_authentication(): void
    {
        $response = $this->get('/settings');

        $response->assertRedirect('/login');
    }

    public function test_search_results_are_filtered_by_query(): void
    {
        $response = $this->get('/search?query=linen');

        $response->assertOk();
        $response->assertSee('Linen Blouse');
        $response->assertDontSee('Denim Jeans');
    }

    public function test_product_detail_quantity_updates_the_hidden_field(): void
    {
        $response = $this->get('/product/linen-blouse');

        $response->assertOk();
        $response->assertSee('id="quantity-input"', false);
        $response->assertSee('function updateQty(delta)', false);
    }

    public function test_complete_customer_journey_from_guest_to_logout(): void
    {
        $response = $this->post('/register', [
            'name' => 'Ayu Customer',
            'email' => 'ayu@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect('/cart');

        $this->actingAs(
            \App\Models\User::where('email', 'ayu@example.com')->firstOrFail()
        );

        $this->get('/category')->assertOk();
        $this->get('/search?query=linen')->assertOk()->assertSee('Linen Blouse');
        $this->get('/product/linen-blouse')->assertOk();

        $this->post('/cart/add', [
            'product_slug' => 'linen-blouse',
            'quantity' => 2,
            'size' => 'M',
            'color' => 'Sand',
        ])->assertRedirect();

        $cartResponse = $this->get('/cart');
        $cartResponse->assertOk();
        $cartResponse->assertSee('Linen Blouse');

        $this->patch('/cart/linen-blouse:M:Sand', ['quantity' => 3])->assertRedirect();

        $checkoutResponse = $this->get('/checkout');
        $checkoutResponse->assertOk();

        $this->post('/checkout', [
            'customer_name' => 'Ayu Customer',
            'email' => 'ayu@example.com',
            'phone' => '+62 812 0000 0000',
            'address' => 'Jl. Sudirman No. 12',
            'shipping_method' => 'standard',
            'payment_method' => 'credit_card',
        ])->assertRedirect();

        $this->get('/orders')->assertOk()->assertSee('RKA-');

        $logoutResponse = $this->post('/logout');
        $logoutResponse->assertRedirect('/');
    }
}
