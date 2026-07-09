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
            'product_slug' => 'vimle',
            'quantity' => 1,
            'color' => 'beige',
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
}
