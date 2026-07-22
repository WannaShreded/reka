# 🛍️ REKA

REKA is a modern and stylish e-commerce web application dedicated to selling curated second-hand (preloved) fashion products. It provides a seamless shopping experience for customers looking for quality thrift fashion and offers a robust admin dashboard for managing the store catalog and orders.

## ✨ Features

- **Authentication:** Secure Login, Registration, Forgot Password, and Email Verification.
- **Product Catalog:** Browse through a curated list of preloved fashion products.
- **Product Categories:** Filter products based on categories.
- **Product Search:** Quickly find items using search functionality.
- **Product Detail:** View comprehensive product information, including condition, size, and multiple images.
- **Shopping Cart:** Add items to cart, update quantities, and prepare for checkout.
- **Wishlist:** Save favorite products for later.
- **Checkout:** Streamlined checkout process with Midtrans payment gateway integration.
- **Order History:** Customers can track their previous orders and view order status.
- **User Profile:** Manage personal information, shipping addresses, and phone numbers.
- **Admin Dashboard:** Overview of store statistics, sales, and recent orders.
- **Product Management:** Full CRUD (Create, Read, Update, Delete) functionality for admins to manage the product catalog.
- **Order Management:** View customer orders and update their fulfillment status.
- **Responsive Design:** Optimized for both desktop and mobile devices.

## 💻 Technologies Used

![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)
![Vite](https://img.shields.io/badge/vite-%23646CFF.svg?style=for-the-badge&logo=vite&logoColor=white)

- **Backend:** Laravel 11.x, PHP 8.3+
- **Frontend:** Blade Templating, Tailwind CSS, Alpine.js, JavaScript
- **Database:** MySQL
- **Build Tools:** Vite, npm, Composer
- **Payments:** Midtrans Integration

## 📁 Folder Structure

- `app/` - Contains the core PHP logic (Controllers, Models, Middleware).
- `config/` - Configuration files for the application (database, mail, services).
- `database/` - Contains database migrations, factories, and seeders.
- `public/` - Publicly accessible files including the entry point (`index.php`), compiled CSS/JS, and uploaded images.
- `resources/` - Uncompiled frontend assets (Tailwind CSS, JS) and Blade templates (`resources/views`).
- `routes/` - Application route definitions (`web.php` for web endpoints).
- `storage/` - Compiled Blade templates, uploaded files, and application logs.
- `tests/` - Automated PHPUnit test files.

## 🗄️ Database Overview

- **`users`**: Stores user credentials, roles (`admin` or `customer`), and profile data (address, phone).
- **`products`**: Contains product details such as name, category, price, condition, size, images, stock, and availability status.
- **`carts`**: Tracks items currently placed in users' shopping carts.
- **`orders`**: Stores customer checkout data, shipping details, grand total, and payment status (integrated with Midtrans).
- **`order_items`**: Associates specific products with their respective orders.

## 🚀 Installation

Follow these steps to set up the project locally:

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/reka.git
   cd reka
   ```

2. **Install Composer dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Copy the environment file**
   ```bash
   cp .env.example .env
   ```

5. **Generate application key**
   ```bash
   php artisan key:generate
   ```

6. **Configure the database**
   Update your `.env` file with your database credentials (and Midtrans API keys):
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=reka
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. **Run migrations**
   ```bash
   php artisan migrate
   ```

8. **Seed the database (Optional)**
   If you have seeders ready to populate dummy data:
   ```bash
   php artisan db:seed
   ```

9. **Build frontend assets**
   ```bash
   npm run build
   ```

10. **Start the development server**
    ```bash
    php artisan serve
    ```
    You can now access the app at `http://localhost:8000`. Alternatively, run `npm run dev` to start Vite along with Laravel using Concurrently.

## 📖 Usage

### For Customers
1. Visit the homepage to view featured preloved fashion items.
2. Register for a new account or Login if you already have one.
3. Browse products by category or use the search bar to find specific items.
4. Click on a product to view details, size, and condition.
5. Add items to your **Cart** or save them to your **Wishlist**.
6. Proceed to Checkout from the cart page, fill in your shipping details, and pay securely via Midtrans.
7. Track your order status in the **Order History** section.

### For Administrators
1. Log in with an Administrator account.
2. Access the **Admin Dashboard** via the profile dropdown.
3. **Product Management:** Navigate to "Products" to add new arrivals, update existing product details/images, or mark items as sold.
4. **Order Management:** Navigate to "Orders" to view customer purchases and update fulfillment statuses (e.g., from `processing` to `shipped`).

## 📸 Screenshots

| Home | Shop / Category |
|------|-----------------|
| ![Home](docs/home.png) | ![Shop](docs/shop.png) |

| Product Detail | Checkout |
|----------------|----------|
| ![Product Detail](docs/product-detail.png) | ![Checkout](docs/checkout.png) |

| Admin Dashboard | Admin Products |
|-----------------|----------------|
| ![Admin Dashboard](docs/admin-dashboard.png) | ![Admin Products](docs/admin-products.png) |

*(Note: Replace screenshot placeholders in `docs/` with actual images)*

## 🔒 Security

This application implements several standard security measures:
- **Authentication:** Secure session-based authentication.
- **Authorization:** Middleware protection ensures only admins can access the dashboard, and only customers can access checkout/profile.
- **CSRF Protection:** All forms are protected against Cross-Site Request Forgery attacks.
- **Input Validation:** Strict server-side validation is enforced for all form submissions to prevent SQL injection and ensure data integrity.
- **Password Hashing:** Passwords are securely hashed using bcrypt.

## 🔮 Future Improvements

- Implement real-time notifications for order status updates.
- Add product reviews and ratings.
- Integrate social login (Google/Facebook).
- Develop a comprehensive blog for thrift fashion tips.
- Expand admin dashboard with graphical sales reports and analytics.

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## ✍️ Author

**[Your Name / Company]**
- GitHub: [@yourusername](https://github.com/yourusername)
- Twitter: [@yourhandle](https://twitter.com/yourhandle)
- Website: [yourwebsite.com](https://yourwebsite.com)
