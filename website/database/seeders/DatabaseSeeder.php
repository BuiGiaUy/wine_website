<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Database\Factories\BrandFactory;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * Order: Admin -> User -> Category -> Brand -> Product -> Order -> OrderItem -> Image -> Menu
     */
    public function run(): void
    {
        // Reset factory indexes
        CategoryFactory::resetIndex();
        BrandFactory::resetIndex();

        // 1. Create Admins
        Admin::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@wine.com',
        ]);
        Admin::factory(2)->create();
        $this->command->info('Created 3 Admins');

        // 2. Create Users
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@wine.com',
        ]);
        User::factory(9)->create();
        $this->command->info('Created 10 Users');

        // 3. Create Categories (Red Wine, White Wine, etc.)
        $categoryRedWine = Category::create([
            'name' => 'Red Wine',
            'slug' => 'red-wine',
            'model_type' => Product::class,
        ]);
        $categoryWhiteWine = Category::create([
            'name' => 'White Wine',
            'slug' => 'white-wine',
            'model_type' => Product::class,
        ]);
        $categoryRose = Category::create([
            'name' => 'Rosé Wine',
            'slug' => 'rose-wine',
            'model_type' => Product::class,
        ]);
        $categoryChampagne = Category::create([
            'name' => 'Champagne',
            'slug' => 'champagne',
            'model_type' => Product::class,
        ]);
        $categorySparkling = Category::create([
            'name' => 'Sparkling Wine',
            'slug' => 'sparkling-wine',
            'model_type' => Product::class,
        ]);
        $this->command->info('Created 5 Categories');

        // 4. Create Brands
        Brand::factory(10)->create();
        $this->command->info('Created 10 Brands');

        // 5. Create Products
        Product::factory(30)->create();
        $this->command->info('Created 30 Products');

        // 6. Create Orders
        $orders = Order::factory(15)->create();
        $this->command->info('Created 15 Orders');

        // 7. Create OrderItems (2-4 items per order)
        $orders->each(function ($order) {
            $itemCount = rand(2, 4);
            OrderItem::factory($itemCount)->forOrder($order)->create();
        });
        $this->command->info('Created OrderItems for each Order');

        // 8. Create Images for Products (1-3 images per product)
        Product::all()->each(function ($product) {
            $imageCount = rand(1, 3);
            Image::factory($imageCount)->forProduct($product)->create();
        });
        $this->command->info('Created Images for each Product');

        // 9. Create Menu Items
        $this->seedMenus();
        $this->command->info('Created Menu Items');

        $this->command->info('');
        $this->command->info('Database seeding completed!');
    }

    /**
     * Seed menu items
     */
    private function seedMenus(): void
    {
        // Main menu items
        $home = Menu::create([
            'name' => 'Trang chủ',
            'url' => '/home',
            'parent_id' => null,
        ]);

        $wines = Menu::create([
            'name' => 'Rượu Vang',
            'url' => '/products',
            'parent_id' => null,
        ]);

        // Submenu for wines
        Menu::create([
            'name' => 'Red Wine',
            'url' => '/products/category/red-wine',
            'parent_id' => $wines->id,
        ]);
        Menu::create([
            'name' => 'White Wine',
            'url' => '/products/category/white-wine',
            'parent_id' => $wines->id,
        ]);
        Menu::create([
            'name' => 'Rosé Wine',
            'url' => '/products/category/rose-wine',
            'parent_id' => $wines->id,
        ]);
        Menu::create([
            'name' => 'Champagne',
            'url' => '/products/category/champagne',
            'parent_id' => $wines->id,
        ]);

        $brands = Menu::create([
            'name' => 'Thương hiệu',
            'url' => '/brands',
            'parent_id' => null,
        ]);

        Menu::create([
            'name' => 'Liên hệ',
            'url' => '/contact',
            'parent_id' => null,
        ]);
    }
}
