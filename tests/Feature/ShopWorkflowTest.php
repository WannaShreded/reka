<?php

namespace Tests\Feature;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
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

    public function test_category_page_renders_filter_toolbar_without_errors(): void
    {
        $response = $this->get('/category');

        $response->assertOk();
        $response->assertSee('All categories');
    }

    public function test_homepage_renders_customer_entry_points(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('action="'.route('search').'"', false);
        $response->assertSee(route('category'), false);
    }

    public function test_dashboard_requires_authentication(): void
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }

    public function test_authenticated_dashboard_exposes_logout_control(): void
    {
        $user = User::factory()->create(['role' => 'customer']);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertOk();
        $response->assertSee('aria-label="Log out"', false);
        $response->assertSee('action="'.route('logout').'"', false);
    }

    public function test_guest_cannot_access_customer_pages(): void
    {
        $response = $this->get('/orders');

        $response->assertRedirect('/login');
    }

    public function test_customer_cannot_access_admin_dashboard(): void
    {
        $user = User::factory()->create([
            'role' => 'customer',
        ]);

        $response = $this->actingAs($user)->get('/admin-dashboard');

        $response->assertRedirect('/dashboard');
    }

    public function test_admin_can_access_admin_dashboard(): void
    {
        $user = User::factory()->create([
            'role' => 'admin',
        ]);

        $response = $this->actingAs($user)->get('/admin-dashboard');

        $response->assertRedirect('/admin/dashboard');

        $this->actingAs($user)->get('/admin/dashboard')->assertOk();
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

    public function test_wishlist_renders_saved_products(): void
    {
        $user = User::factory()->create(['role' => 'customer']);

        $this->actingAs($user)->post('/wishlist/add', [
            'product_slug' => 'linen-blouse',
        ])->assertRedirect();

        $this->actingAs($user)
            ->get('/wishlist')
            ->assertOk()
            ->assertSee('Linen Blouse');
    }

    public function test_available_products_are_sorted_before_sold_out_products_across_catalog_views(): void
    {
        Product::create([
            'slug' => 'sold-out-piece',
            'name' => 'A Sold Out Piece',
            'price' => 200000,
            'image' => 'products/Linen Blouse.jpg',
            'images' => ['products/Linen Blouse.jpg'],
            'sizes' => ['M'],
            'colors' => ['Sand'],
            'stock' => 0,
            'rating' => 4.2,
            'description' => 'A sold out piece.',
            'badge' => 'Pre-loved',
            'category' => 'Atasan',
        ]);

        Product::create([
            'slug' => 'available-piece',
            'name' => 'B Available Piece',
            'price' => 300000,
            'image' => 'products/Linen Blouse.jpg',
            'images' => ['products/Linen Blouse.jpg'],
            'sizes' => ['M'],
            'colors' => ['Sand'],
            'stock' => 2,
            'rating' => 4.8,
            'description' => 'An available piece.',
            'badge' => 'Pre-loved',
            'category' => 'Atasan',
        ]);

        $homeResponse = $this->get('/');
        $homeResponse->assertOk();
        $homeResponse->assertSeeInOrder(['B Available Piece', 'A Sold Out Piece']);

        $categoryResponse = $this->get('/category');
        $categoryResponse->assertOk();
        $categoryResponse->assertSeeInOrder(['B Available Piece', 'A Sold Out Piece']);

        $searchResponse = $this->get('/search?query=piece');
        $searchResponse->assertOk();
        $searchResponse->assertSeeInOrder(['B Available Piece', 'A Sold Out Piece']);
    }

    public function test_wishlist_and_cart_counts_are_exposed_for_the_current_session(): void
    {
        $this->withSession(['wishlist' => ['linen-blouse' => true]])
            ->getJson('/wishlist/count')
            ->assertOk()
            ->assertExactJson(['count' => 1]);

        $this->withSession(['guest_cart' => [
            'linen-blouse:M:Sand' => ['product_slug' => 'linen-blouse', 'quantity' => 1],
        ]])
            ->getJson('/cart/count')
            ->assertOk()
            ->assertExactJson(['count' => 1]);
    }

    public function test_product_detail_disables_buy_now_for_sold_out_products(): void
    {
        $product = Product::create([
            'slug' => 'sold-out-product',
            'name' => 'Sold Out Product',
            'price' => 350000,
            'image' => 'products/Linen Blouse.jpg',
            'images' => ['products/Linen Blouse.jpg'],
            'sizes' => ['M'],
            'colors' => ['Sand'],
            'stock' => 0,
            'rating' => 4.8,
            'description' => 'A sold out product.',
            'badge' => 'Pre-loved',
            'category' => 'Atasan',
        ]);

        $response = $this->get('/product/'.$product->slug);

        $response->assertOk();
        $response->assertSee('Barang Habis');
        $response->assertDontSee('Buy It Now');
    }

    public function test_product_detail_shows_single_unit_selection(): void
    {
        $response = $this->get('/product/linen-blouse');

        $response->assertOk();
        $response->assertSee('1 unit', false);
        $response->assertDontSee('function updateQty(delta)', false);
        $response->assertSee(asset('images/products/Linen Blouse.jpg'), false);
    }

    public function test_checkout_prefills_customer_profile_shipping_information(): void
    {
        $user = User::factory()->create([
            'role' => 'customer',
            'name' => 'Ayu Customer',
            'email' => 'ayu@example.com',
            'phone' => '+62 812 0000 0000',
            'address_line_1' => 'Jl. Sudirman No. 12',
            'city' => 'Jakarta Selatan',
            'province' => 'DKI Jakarta',
            'postal_code' => '12950',
            'country' => 'Indonesia',
        ]);

        $this->actingAs($user)->post('/cart/add', [
            'product_slug' => 'linen-blouse',
            'quantity' => 1,
            'size' => 'M',
            'color' => 'Sand',
        ]);

        $response = $this->actingAs($user)->get('/checkout');

        $response->assertOk();
        $response->assertSee('value="Ayu Customer"', false);
        $response->assertSee('value="+62 812 0000 0000"', false);
        $response->assertSee('Jl. Sudirman No. 12, Jakarta Selatan, DKI Jakarta, 12950, Indonesia');
    }

    public function test_checkout_creates_order_items_reduces_stock_and_clears_cart(): void
    {
        config(['services.midtrans.server_key' => 'SB-Mid-server-test']);
        Http::fake([
            'app.sandbox.midtrans.com/snap/v1/transactions' => Http::response([
                'token' => 'snap-token-test',
                'redirect_url' => 'https://app.sandbox.midtrans.com/snap/v2/vtweb/snap-token-test',
            ]),
        ]);

        $user = User::factory()->create(['role' => 'customer']);

        $this->actingAs($user)->post('/cart/add', [
            'product_slug' => 'linen-blouse',
            'quantity' => 1,
            'size' => 'M',
            'color' => 'Sand',
        ]);

        $response = $this->actingAs($user)->post('/checkout', [
            'customer_name' => 'Ayu Customer',
            'email' => 'ayu@example.com',
            'phone' => '+62 812 0000 0000',
            'address' => 'Jl. Sudirman No. 12',
            'shipping_method' => 'standard',
            'payment_method' => 'bank_transfer',
        ]);

        $order = Order::firstOrFail();
        $product = Product::where('slug', 'linen-blouse')->firstOrFail();

        $response->assertRedirect('https://app.sandbox.midtrans.com/snap/v2/vtweb/snap-token-test');
        $this->assertSame('pending', $order->refresh()->payment_status);
        $this->assertSame('pending_payment', $order->status);
        $this->assertSame('snap-token-test', $order->snap_token);
        $this->assertSame(1, $order->orderItems()->count());
        $this->assertDatabaseHas('order_items', [
            'order_id' => $order->id,
            'product_slug' => 'linen-blouse',
            'quantity' => 1,
            'unit_price' => 350000,
            'line_total' => 350000,
        ]);
        $this->assertSame(9, $product->stock);
        $this->assertSame([], Cart::where('user_id', $user->id)->firstOrFail()->items);
    }

    public function test_sold_out_products_cannot_be_added_to_cart_and_show_sold_out_badge(): void
    {
        $product = Product::create([
            'slug' => 'linen-blouse',
            'name' => 'Linen Blouse',
            'price' => 350000,
            'image' => 'products/Linen Blouse.jpg',
            'images' => ['products/Linen Blouse.jpg'],
            'sizes' => ['M'],
            'colors' => ['Sand'],
            'stock' => 0,
            'rating' => 4.8,
            'description' => 'A pre-loved linen blouse.',
            'badge' => 'Pre-loved',
            'category' => 'Atasan',
        ]);

        $response = $this->post('/cart/add', [
            'product_slug' => $product->slug,
            'quantity' => 1,
            'size' => 'M',
            'color' => 'Sand',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['stock']);

        $detailResponse = $this->get('/product/'.$product->slug);
        $detailResponse->assertOk();
        $detailResponse->assertSee('Barang Habis');
        $detailResponse->assertDontSee('Add to Cart');
    }

    public function test_quantity_cannot_exceed_one_for_single_unit_products(): void
    {
        $user = User::factory()->create(['role' => 'customer']);

        $response = $this->actingAs($user)->post('/cart/add', [
            'product_slug' => 'linen-blouse',
            'quantity' => 2,
            'size' => 'M',
            'color' => 'Sand',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['quantity']);
        $this->assertSame([], Cart::where('user_id', $user->id)->first()?->items ?? []);
    }

    public function test_checkout_rolls_back_when_stock_is_not_available(): void
    {
        $user = User::factory()->create(['role' => 'customer']);

        $this->actingAs($user)->post('/cart/add', [
            'product_slug' => 'linen-blouse',
            'quantity' => 1,
            'size' => 'M',
            'color' => 'Sand',
        ]);

        Product::where('slug', 'linen-blouse')->update(['stock' => 0]);

        $response = $this->actingAs($user)->post('/checkout', [
            'customer_name' => 'Ayu Customer',
            'email' => 'ayu@example.com',
            'phone' => '+62 812 0000 0000',
            'address' => 'Jl. Sudirman No. 12',
            'shipping_method' => 'standard',
            'payment_method' => 'bank_transfer',
        ]);

        $response->assertRedirect(route('cart'));
        $response->assertSessionHasErrors(['cart']);
        $this->assertDatabaseCount('orders', 0);
        $this->assertDatabaseCount('order_items', 0);
        $this->assertSame(0, Product::where('slug', 'linen-blouse')->firstOrFail()->stock);
        $this->assertNotEmpty(Cart::where('user_id', $user->id)->firstOrFail()->items);
    }

    public function test_complete_customer_journey_from_guest_to_logout(): void
    {
        config(['services.midtrans.server_key' => 'SB-Mid-server-test']);
        Http::fake([
            'app.sandbox.midtrans.com/snap/v1/transactions' => Http::response([
                'token' => 'snap-token-test',
                'redirect_url' => 'https://app.sandbox.midtrans.com/snap/v2/vtweb/snap-token-test',
            ]),
        ]);

        $response = $this->post('/register', [
            'name' => 'Ayu Customer',
            'email' => 'ayu@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect('/dashboard');

        $this->actingAs(
            User::where('email', 'ayu@example.com')->firstOrFail()
        );

        $this->get('/category')->assertOk();
        $this->get('/search?query=linen')->assertOk()->assertSee('Linen Blouse');
        $this->get('/product/linen-blouse')->assertOk();

        $this->post('/cart/add', [
            'product_slug' => 'linen-blouse',
            'quantity' => 1,
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
        ])->assertRedirect('https://app.sandbox.midtrans.com/snap/v2/vtweb/snap-token-test');

        $this->get('/orders')->assertOk()->assertSee('RKA-');

        $logoutResponse = $this->post('/logout');
        $logoutResponse->assertRedirect('/');
    }
}
