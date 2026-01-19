# 🍷 BIGBA Wine - Premium Wine E-commerce Website

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.1+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Vite-5.x-646CFF?style=for-the-badge&logo=vite&logoColor=white" alt="Vite">
  <img src="https://img.shields.io/badge/Bootstrap-5.x-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap">
</p>

<p align="center">
  <strong>A premium e-commerce platform for fine wines and premium spirits</strong>
</p>

---

## 📋 Table of Contents

- [Overview](#-overview)
- [Screenshots](#-screenshots)
- [Features](#-features)
- [Tech Stack](#-tech-stack)
- [System Requirements](#-system-requirements)
- [Installation](#-installation)
- [Configuration](#-configuration)
- [Running the Application](#-running-the-application)
- [Project Structure](#-project-structure)
- [API Endpoints](#-api-endpoints)
- [Contributing](#-contributing)
- [License](#-license)

---

## 🌟 Overview

**BIGBA Wine** is a full-featured e-commerce system built on Laravel, specializing in fine wines and premium spirits. The website features a luxurious burgundy and gold design, providing a smooth and elegant user experience for wine enthusiasts.

### Key Highlights

- 🎨 **Premium Design** - Elegant burgundy and gold color scheme with modern UI/UX
- 🛒 **Complete E-commerce** - Shopping cart, checkout, order management
- 💳 **Multiple Payment Methods** - VNPay, Cash on Delivery (COD), Bank Transfer
- 📱 **Responsive Design** - Fully compatible with all devices
- 🔐 **Secure Authentication** - Laravel Sanctum with separate User/Admin authentication
- 📝 **Blog & Knowledge Base** - Share wine culture and tasting notes
- 💬 **Real-time Comments** - Pusher integration for live discussions
- ❤️ **Wishlist System** - Save favorite products for later
- ⭐ **Product Reviews** - Customer ratings and reviews

---

## 📸 Screenshots

> _Screenshots will be added here_

<!--
### Homepage
![Homepage](screenshots/homepage.png)

### Product Listing
![Products](screenshots/products.png)

### Product Detail
![Product Detail](screenshots/product-detail.png)

### Shopping Cart
![Cart](screenshots/cart.png)

### Admin Dashboard
![Admin Dashboard](screenshots/admin-dashboard.png)
-->

---

## ✨ Features

### 👤 Customer (Frontend)

| Feature               | Description                                        |
| --------------------- | -------------------------------------------------- |
| 🏠 Homepage           | Hero banner, featured products, product categories |
| 🍷 Product Catalog    | Browse wines by category, brand, and price range   |
| 🔍 Search             | Search products by name, brand, or description     |
| 📦 Product Details    | Detailed product info, images gallery, reviews     |
| 🛒 Shopping Cart      | Add, update, remove products with quantity control |
| 💳 Checkout           | VNPay, COD, Bank Transfer payment options          |
| 👤 User Account       | Registration, login, profile management            |
| 📍 Address Management | Save and manage shipping addresses                 |
| 📦 Order Tracking     | View order history and status                      |
| ❤️ Wishlist           | Save favorite products                             |
| ⭐ Product Reviews    | Leave ratings and reviews                          |
| 📝 Blog               | Read articles about wine culture                   |
| 💬 Comments           | Real-time commenting on blog posts                 |
| 🏭 Brands             | Explore wine producers and brands                  |
| 📞 Contact            | Contact form for inquiries                         |

### 👨‍💼 Admin Panel

| Feature                | Description                                      |
| ---------------------- | ------------------------------------------------ |
| 📊 Dashboard           | Overview statistics, recent orders, user metrics |
| 📦 Product Management  | CRUD operations with image gallery               |
| 📂 Category Management | Hierarchical product categorization              |
| 🏭 Brand Management    | Manage wine producers and brands                 |
| 📋 Order Management    | Process orders, update status, export data       |
| 👥 User Management     | View and manage customer accounts                |
| 📝 Post Management     | Create and manage blog articles                  |
| 📁 File Manager        | Upload and manage media files                    |
| ⚙️ Profile Settings    | Admin profile and password management            |

---

## 🛠 Tech Stack

### Backend

| Technology               | Version | Purpose               |
| ------------------------ | ------- | --------------------- |
| **Laravel**              | 10.x    | PHP Framework         |
| **PHP**                  | 8.1+    | Server-side language  |
| **MySQL**                | 8.0     | Database              |
| **Laravel Sanctum**      | 3.x     | API Authentication    |
| **Pusher**               | 7.x     | Real-time WebSocket   |
| **Laravel File Manager** | 3.x     | Media management      |
| **Darryldecode Cart**    | 4.x     | Shopping cart library |
| **Maatwebsite Excel**    | 3.x     | Export functionality  |

### Frontend

| Technology    | Purpose                 |
| ------------- | ----------------------- |
| **Blade**     | Laravel template engine |
| **Bootstrap** | 5.x CSS framework       |
| **Vite**      | 5.x Build tool          |
| **SASS**      | CSS preprocessor        |
| **jQuery**    | DOM manipulation        |
| **TinyMCE**   | Rich text editor        |

### Development Tools

| Tool                 | Purpose            |
| -------------------- | ------------------ |
| **Laravel Debugbar** | Debugging          |
| **PHPUnit**          | Testing            |
| **Laravel Pint**     | Code styling       |
| **Laravel Sail**     | Docker development |

---

## 📦 System Requirements

| Requirement | Minimum Version |
| ----------- | --------------- |
| PHP         | >= 8.1          |
| Composer    | >= 2.0          |
| Node.js     | >= 18.0         |
| NPM         | >= 9.0          |
| MySQL       | >= 8.0          |

### Required PHP Extensions

- BCMath, Ctype, Fileinfo, JSON
- Mbstring, OpenSSL, PDO, Tokenizer, XML

---

## 🚀 Installation

### 1. Clone the repository

```bash
git clone https://github.com/your-username/wine_website.git
cd wine_website
```

### 2. Install PHP dependencies

```bash
cd website
composer install
```

### 3. Install JavaScript dependencies

```bash
npm install
```

### 4. Create environment file

```bash
cp .env.example .env
```

### 5. Generate application key

```bash
php artisan key:generate
```

### 6. Create database

Create a MySQL database named `wine_website`

### 7. Run migrations

```bash
php artisan migrate
```

### 8. Seed sample data (optional)

```bash
php artisan db:seed
```

### 9. Create storage symbolic link

```bash
php artisan storage:link
```

---

## ⚙️ Configuration

### Environment Variables (`.env`)

```env
# Application
APP_NAME="BIGBA Wine"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wine_website
DB_USERNAME=root
DB_PASSWORD=

# Pusher (Real-time comments)
PUSHER_APP_ID=your_app_id
PUSHER_APP_KEY=your_app_key
PUSHER_APP_SECRET=your_app_secret
PUSHER_APP_CLUSTER=ap1

# VNPay Configuration (Optional)
VNPAY_TMN_CODE=your_tmn_code
VNPAY_HASH_SECRET=your_hash_secret
VNPAY_URL=https://sandbox.vnpayment.vn/paymentv2/vpcpay.html
```

---

## 🖥 Running the Application

### Using Laravel Development Server

```bash
cd website

# Terminal 1: Start Laravel server
php artisan serve

# Terminal 2: Start Vite dev server (for assets)
npm run dev
```

Access the application at: http://localhost:8000

### Using Open Server Panel (OSPanel)

1. Start OSPanel and enable MySQL
2. Configure domain `winewebsite.th` pointing to `website/public`
3. Access: http://winewebsite.th

### Build for Production

```bash
npm run build
```

---

## 📁 Project Structure

```
wine_website/
├── .git/                    # Git repository
├── .gitignore               # Git ignore rules
├── README.md                # Documentation (this file)
│
└── website/                 # Laravel Application
    ├── app/
    │   ├── Http/
    │   │   ├── Controllers/
    │   │   │   ├── Admin/           # Admin controllers
    │   │   │   │   ├── BrandController.php
    │   │   │   │   ├── CategoryController.php
    │   │   │   │   ├── DashboardController.php
    │   │   │   │   ├── OrderController.php
    │   │   │   │   ├── PostController.php
    │   │   │   │   ├── ProductController.php
    │   │   │   │   └── UserController.php
    │   │   │   ├── Auth/            # Authentication
    │   │   │   ├── Frontend/        # Frontend controllers
    │   │   │   │   ├── BrandController.php
    │   │   │   │   ├── CommentController.php
    │   │   │   │   ├── PostController.php
    │   │   │   │   ├── ProductController.php
    │   │   │   │   ├── ProductReviewController.php
    │   │   │   │   ├── UserController.php
    │   │   │   │   └── WishlistController.php
    │   │   │   ├── Orders/          # Order processing
    │   │   │   ├── CartController.php
    │   │   │   └── HomeController.php
    │   │   └── Middleware/
    │   └── Models/
    │       ├── Admin.php
    │       ├── Brand.php
    │       ├── Category.php
    │       ├── Comment.php
    │       ├── Image.php
    │       ├── Order.php
    │       ├── OrderItem.php
    │       ├── Payment.php
    │       ├── Post.php
    │       ├── Product.php
    │       ├── ProductReview.php
    │       ├── User.php
    │       ├── UserInfo.php
    │       └── Wishlist.php
    │
    ├── config/                  # Configuration files
    ├── database/
    │   ├── migrations/          # Database migrations
    │   ├── factories/           # Model factories
    │   └── seeders/             # Database seeders
    │
    ├── public/                  # Public assets
    │   ├── index.php
    │   ├── css/
    │   ├── js/
    │   └── images/
    │
    ├── resources/
    │   ├── views/
    │   │   ├── admin/           # Admin dashboard views
    │   │   ├── auth/            # Authentication views
    │   │   ├── content/         # Frontend views
    │   │   │   ├── brands/
    │   │   │   ├── cart/
    │   │   │   ├── orders/
    │   │   │   ├── posts/
    │   │   │   ├── products/
    │   │   │   ├── user/
    │   │   │   └── wishlist/
    │   │   ├── layouts/
    │   │   └── partials/
    │   ├── css/
    │   └── js/
    │
    ├── routes/
    │   ├── web.php              # Frontend routes
    │   ├── admin.php            # Admin panel routes
    │   ├── api.php              # API routes
    │   └── channels.php         # Broadcast channels
    │
    ├── storage/                 # Storage files
    ├── .env                     # Environment config
    ├── composer.json            # PHP dependencies
    ├── package.json             # JS dependencies
    └── vite.config.js           # Vite configuration
```

---

## 🔗 API Endpoints

### Authentication

| Method | Endpoint    | Description          |
| ------ | ----------- | -------------------- |
| GET    | `/login`    | Login page           |
| POST   | `/login`    | Process login        |
| GET    | `/register` | Registration page    |
| POST   | `/register` | Process registration |
| POST   | `/logout`   | Logout user          |

### Products

| Method | Endpoint                    | Description           |
| ------ | --------------------------- | --------------------- |
| GET    | `/products`                 | Product listing       |
| GET    | `/products/{slug}`          | Product details       |
| GET    | `/products/category/{slug}` | Products by category  |
| GET    | `/search`                   | Search products       |
| POST   | `/products/{slug}/review`   | Submit product review |

### Cart

| Method | Endpoint            | Description     |
| ------ | ------------------- | --------------- |
| GET    | `/cart`             | View cart       |
| POST   | `/cart/add`         | Add to cart     |
| POST   | `/cart/update/{id}` | Update quantity |
| GET    | `/cart/remove/{id}` | Remove item     |
| GET    | `/cart/clear`       | Clear cart      |
| GET    | `/cart/checkout`    | Checkout page   |

### Orders

| Method | Endpoint              | Description    |
| ------ | --------------------- | -------------- |
| GET    | `/orders`             | Order history  |
| GET    | `/orders/{id}`        | Order details  |
| POST   | `/cart/checkoutCash`  | COD checkout   |
| POST   | `/cart/checkoutVNPay` | VNPay checkout |

### Wishlist

| Method | Endpoint           | Description              |
| ------ | ------------------ | ------------------------ |
| GET    | `/wishlist`        | View wishlist            |
| POST   | `/wishlist/toggle` | Add/Remove from wishlist |
| POST   | `/wishlist/remove` | Remove from wishlist     |

### Brands

| Method | Endpoint         | Description   |
| ------ | ---------------- | ------------- |
| GET    | `/brands`        | Brand listing |
| GET    | `/brands/{slug}` | Brand details |

### Blog Posts

| Method | Endpoint                       | Description  |
| ------ | ------------------------------ | ------------ |
| GET    | `/posts`                       | Post listing |
| GET    | `/posts/{slug}`                | Post details |
| POST   | `/posts/comments/store/{slug}` | Add comment  |

### User Profile

| Method | Endpoint         | Description        |
| ------ | ---------------- | ------------------ |
| GET    | `/user/profile`  | User profile       |
| POST   | `/user/profile`  | Update profile     |
| GET    | `/user/address`  | Address management |
| POST   | `/user/address`  | Update address     |
| POST   | `/user/password` | Change password    |

---

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a new branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

---

## 📄 License

This project is distributed under the [MIT License](LICENSE).

---

## 👨‍💻 Author

**BIGBA Wine Team**

- 🌐 Website: [bigba.wine](http://bigba.wine)
- 📧 Email: contact@bigba.wine

---

<p align="center">
  Made with ❤️ and 🍷
</p>
