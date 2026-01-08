# 🍷 Wine Website - Hệ thống E-commerce Rượu Vang

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.1+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Vite-5.x-646CFF?style=for-the-badge&logo=vite&logoColor=white" alt="Vite">
</p>

<p align="center">
  <strong>Website thương mại điện tử chuyên bán rượu vang và rượu mạnh cao cấp</strong>
</p>

---

## 📋 Mục lục

- [Tổng quan](#-tổng-quan)
- [Tính năng](#-tính-năng)
- [Công nghệ sử dụng](#-công-nghệ-sử-dụng)
- [Yêu cầu hệ thống](#-yêu-cầu-hệ-thống)
- [Cài đặt](#-cài-đặt)
- [Cấu hình](#-cấu-hình)
- [Chạy ứng dụng](#-chạy-ứng-dụng)
- [Cấu trúc thư mục](#-cấu-trúc-thư-mục)
- [API Endpoints](#-api-endpoints)
- [Đóng góp](#-đóng-góp)
- [Giấy phép](#-giấy-phép)

---

## 🌟 Tổng quan

**Wine Website** là một hệ thống thương mại điện tử hoàn chỉnh được xây dựng trên nền tảng Laravel, chuyên phục vụ việc kinh doanh rượu vang và rượu mạnh cao cấp. Website được thiết kế với giao diện sang trọng, hiện đại và trải nghiệm người dùng mượt mà.

### Điểm nổi bật:

- 🎨 **Giao diện Premium** - Thiết kế sang trọng với tông màu đỏ burgundy đặc trưng
- 🛒 **E-commerce đầy đủ** - Giỏ hàng, thanh toán, quản lý đơn hàng
- 💳 **Đa phương thức thanh toán** - VNPay, COD, Chuyển khoản
- 📱 **Responsive Design** - Tương thích mọi thiết bị
- 🔐 **Bảo mật** - Laravel Sanctum authentication
- 📝 **Blog & Kiến thức** - Chia sẻ văn hóa rượu vang
- 💬 **Comment Realtime** - Pusher integration

---

## ✨ Tính năng

### 👤 Khách hàng (Frontend)

| Tính năng        | Mô tả                                              |
| ---------------- | -------------------------------------------------- |
| 🏠 Trang chủ     | Banner slider, danh mục sản phẩm, sản phẩm nổi bật |
| 🍷 Danh mục rượu | Rượu vang, Rượu mạnh theo vùng/giống nho           |
| 🔍 Tìm kiếm      | Tìm kiếm sản phẩm theo tên, thương hiệu            |
| 🛒 Giỏ hàng      | Thêm, sửa, xóa sản phẩm                            |
| 💳 Thanh toán    | VNPay, COD, Chuyển khoản ngân hàng                 |
| 👤 Tài khoản     | Đăng ký, đăng nhập, quản lý thông tin              |
| 📦 Đơn hàng      | Theo dõi trạng thái đơn hàng                       |
| 📝 Blog          | Đọc bài viết, bình luận realtime                   |
| 🏭 Nhà sản xuất  | Xem thông tin các thương hiệu rượu                 |

### 👨‍💼 Quản trị viên (Admin Panel)

| Tính năng              | Mô tả                   |
| ---------------------- | ----------------------- |
| 📊 Dashboard           | Thống kê tổng quan      |
| 📦 Quản lý sản phẩm    | CRUD sản phẩm, hình ảnh |
| 📂 Quản lý danh mục    | Phân loại sản phẩm      |
| 🏭 Quản lý thương hiệu | Nhà sản xuất/Brands     |
| 📋 Quản lý đơn hàng    | Xử lý đơn hàng          |
| 👥 Quản lý người dùng  | Khách hàng, Admin       |
| 📝 Quản lý bài viết    | Blog posts              |
| 📁 File Manager        | Quản lý media files     |

---

## 🛠 Công nghệ sử dụng

### Backend

- **Framework**: Laravel 10.x
- **PHP**: 8.1+
- **Database**: MySQL 8.0
- **Authentication**: Laravel Sanctum
- **Real-time**: Pusher
- **File Manager**: Laravel File Manager
- **Shopping Cart**: Darryldecode Cart

### Frontend

- **Template Engine**: Blade
- **CSS Framework**: UIkit
- **Build Tool**: Vite
- **JavaScript**: Vanilla JS + jQuery

### DevTools

- **Debug**: Laravel Debugbar
- **Testing**: PHPUnit
- **Code Style**: Laravel Pint

---

## 📦 Yêu cầu hệ thống

| Yêu cầu  | Phiên bản |
| -------- | --------- |
| PHP      | >= 8.1    |
| Composer | >= 2.0    |
| Node.js  | >= 18.0   |
| NPM      | >= 9.0    |
| MySQL    | >= 8.0    |

### PHP Extensions cần thiết:

- BCMath, Ctype, Fileinfo, JSON
- Mbstring, OpenSSL, PDO, Tokenizer, XML

---

## 🚀 Cài đặt

### 1. Clone repository

```bash
git clone https://github.com/your-username/wine_website.git
cd wine_website
```

### 2. Cài đặt dependencies PHP

```bash
cd website
composer install
```

### 3. Cài đặt dependencies JavaScript

```bash
npm install
```

### 4. Tạo file môi trường

```bash
cp .env.example .env
```

### 5. Generate application key

```bash
php artisan key:generate
```

### 6. Tạo database

Tạo database MySQL với tên `wine_website`

### 7. Chạy migrations

```bash
php artisan migrate
```

### 8. Seed dữ liệu mẫu (tùy chọn)

```bash
php artisan db:seed
```

### 9. Tạo symbolic link cho storage

```bash
php artisan storage:link
```

---

## ⚙️ Cấu hình

### File `.env` - Các biến quan trọng:

```env
# Application
APP_NAME="Wine Website"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://winewebsite.th/

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
```

---

## 🖥 Chạy ứng dụng

### Sử dụng Open Server Panel (OSPanel)

1. Mở OSPanel và khởi động MySQL
2. Cấu hình domain `winewebsite.th` trỏ đến thư mục `website/public`
3. Truy cập: http://winewebsite.th/home

### Sử dụng Laravel Development Server

```bash
cd website

# Terminal 1: Laravel server
php artisan serve

# Terminal 2: Vite dev server (assets)
npm run dev
```

Truy cập: http://localhost:8000

### Build production assets

```bash
npm run build
```

---

## 📁 Cấu trúc thư mục

```
wine_website/
├── .git/                   # Git repository
├── .gitignore              # Git ignore rules
├── README.md               # Documentation (file này)
│
└── website/                # Laravel Application
    ├── app/
    │   ├── Http/
    │   │   ├── Controllers/
    │   │   │   ├── Admin/          # Admin controllers
    │   │   │   ├── Auth/           # Authentication
    │   │   │   ├── Frontend/       # Frontend controllers
    │   │   │   ├── CartController.php
    │   │   │   └── HomeController.php
    │   │   └── Middleware/
    │   └── Models/
    │       ├── Product.php
    │       ├── Category.php
    │       ├── Brand.php
    │       ├── Order.php
    │       ├── Post.php
    │       └── User.php
    │
    ├── config/                 # Configuration files
    ├── database/
    │   ├── migrations/         # Database migrations
    │   ├── factories/          # Model factories
    │   └── seeders/            # Database seeders
    │
    ├── public/                 # Public assets
    │   ├── index.php
    │   ├── css/
    │   ├── js/
    │   └── images/
    │
    ├── resources/
    │   ├── views/
    │   │   ├── admin/          # Admin views
    │   │   ├── content/        # Frontend views
    │   │   │   ├── cart/
    │   │   │   ├── posts/
    │   │   │   ├── products/
    │   │   │   └── layouts/
    │   │   └── auth/           # Auth views
    │   ├── css/
    │   └── js/
    │
    ├── routes/
    │   ├── web.php             # Web routes
    │   ├── admin.php           # Admin routes
    │   └── api.php             # API routes
    │
    ├── storage/                # Storage files
    ├── .env                    # Environment config
    ├── composer.json           # PHP dependencies
    ├── package.json            # JS dependencies
    └── vite.config.js          # Vite configuration
```

---

## 🔗 API Endpoints

### Authentication

| Method | Endpoint    | Mô tả     |
| ------ | ----------- | --------- |
| POST   | `/login`    | Đăng nhập |
| POST   | `/register` | Đăng ký   |
| POST   | `/logout`   | Đăng xuất |

### Products

| Method | Endpoint                    | Mô tả                  |
| ------ | --------------------------- | ---------------------- |
| GET    | `/products`                 | Danh sách sản phẩm     |
| GET    | `/products/{slug}`          | Chi tiết sản phẩm      |
| GET    | `/products/category/{slug}` | Sản phẩm theo danh mục |

### Cart

| Method | Endpoint            | Mô tả             |
| ------ | ------------------- | ----------------- |
| GET    | `/cart`             | Xem giỏ hàng      |
| POST   | `/cart/add`         | Thêm vào giỏ      |
| POST   | `/cart/update/{id}` | Cập nhật số lượng |
| GET    | `/cart/remove/{id}` | Xóa sản phẩm      |
| GET    | `/cart/checkout`    | Thanh toán        |

### Brands

| Method | Endpoint         | Mô tả                 |
| ------ | ---------------- | --------------------- |
| GET    | `/brands`        | Danh sách thương hiệu |
| GET    | `/brands/{slug}` | Chi tiết thương hiệu  |

---

## 🤝 Đóng góp

Chúng tôi hoan nghênh mọi đóng góp! Hãy làm theo các bước sau:

1. Fork repository
2. Tạo branch mới (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Mở Pull Request

---

## 📄 Giấy phép

Dự án này được phân phối theo giấy phép [MIT License](LICENSE).

---

## 👨‍💻 Tác giả

**Wine Website Team**

- 🌐 Website: [winewebsite.th](http://winewebsite.th)
- 📧 Email: contact@winewebsite.th

---

<p align="center">
  Made with ❤️ and 🍷
</p>
