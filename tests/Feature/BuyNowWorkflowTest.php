<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product;

class BuyNowWorkflowTest extends TestCase
{
    use RefreshDatabase;

    public function test_buy_now_adds_item_and_redirects_to_checkout(): void
    {
        $user = User::factory()->create();
        $product = Product::create([
            'slug' => 'test-product',
            'name' => 'Test Product',
            'price' => 100,
            'image' => 'products/test.jpg',
            'images' => [],
            'colors' => [],
            'category' => 'Test',
            'status' => 'available',
            'stock' => 1,
            'sizes' => ['M'],
        ]);

        $response = $this->actingAs($user)->post('/cart/buy-now', [
            'product_slug' => $product->slug,
            'quantity' => 1,
            'size' => 'M',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/checkout');
        
        $response->assertSessionHas('checkout_mode', 'buy_now');
        $this->assertTrue(session()->has('buy_now_items'));
        
        $buyNowItems = session('buy_now_items');
        $this->assertCount(1, $buyNowItems);
        $this->assertEquals($product->slug, array_values($buyNowItems)[0]['product_slug']);
        
        // Cart should be untouched
        $cart = \App\Models\Cart::where('user_id', $user->id)->first();
        $this->assertNull($cart);
    }

    public function test_buy_now_fails_for_sold_product(): void
    {
        $user = User::factory()->create();
        $product = Product::create([
            'slug' => 'sold-product',
            'name' => 'Sold Product',
            'price' => 100,
            'image' => 'products/test.jpg',
            'images' => [],
            'colors' => [],
            'category' => 'Test',
            'status' => 'sold',
            'stock' => 1,
            'sizes' => ['M'],
        ]);

        $response = $this->actingAs($user)->post('/cart/buy-now', [
            'product_slug' => $product->slug,
            'quantity' => 1,
            'size' => 'M',
        ]);

        $response->assertSessionHasErrors(['stock' => 'Product is no longer available.']);
        $cart = \App\Models\Cart::where('user_id', $user->id)->first();
        if ($cart) {
            $this->assertCount(0, $cart->items ?? []);
        } else {
            $this->assertNull($cart);
        }
    }
}
