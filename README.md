# 🪑 Parlo - E-Commerce Furniture Store

A robust, full-stack e-commerce platform built with core PHP, designed specifically for a modern furniture store. This project features a responsive, user-friendly storefront for customers and a comprehensive, secure admin dashboard for seamless store management.

![PHP](https://img.shields.io/badge/Language-PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/Database-MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![JavaScript](https://img.shields.io/badge/Scripting-JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![Stripe](https://img.shields.io/badge/Payments-Stripe-008CDD?style=for-the-badge&logo=stripe&logoColor=white)

## ✨ Key Features

### 🛒 Customer Storefront
* **User Authentication:** Secure registration, login, and password recovery.
* **Product Catalog:** Browse, filter, and search for furniture items dynamically via AJAX.
* **Shopping Experience:** Fully functional Cart and Wishlist systems.
* **Product Comparison:** Side-by-side comparison of furniture specifications.
* **Secure Checkout:** Integrated **Stripe** payment gateway for secure online transactions.
* **Order Management:** View order history and generate downloadable invoices.
* **User Profiles:** Customers can manage their personal details, addresses, and account settings.
* **Reviews & Ratings:** Users can leave feedback on purchased products.

### ⚙️ Admin Dashboard (`/parlo-dashboard`)
* **Secure Access:** Dedicated administrative login.
* **Product Management:** Complete CRUD operations (Add, View, Update, Delete) for products, including image uploads and status toggling.
* **Inventory Organization:** Manage Categories, Brands, and Models dynamically.
* **User Management:** Monitor registered customers, update statuses, or remove accounts.
* **Order Tracking:** Overview of customer orders and payment statuses.

## 🛠️ Technology Stack

* **Backend:** Core PHP (Procedural/OOP)
* **Frontend:** HTML5, CSS3, JavaScript, jQuery, AJAX
* **Styling/UI:** Bootstrap Framework, various JS plugins (Owl Carousel, Lightbox, Nice Select)
* **Database:** MySQL
* **Mailing:** PHPMailer (for registration verification, password resets, and invoices)
* **Payments:** Stripe API (Webhook integration)
* **Dependency Management:** Composer

## 📂 Project Structure

```text
├── assets/                 # Frontend CSS, JS, Images, and Fonts
├── content/                # Global layout files (header.php, footer.php, connection.php)
├── parlo-dashboard/        # 🔒 Secure Admin Dashboard application
│   ├── process/            # Admin backend logic (CRUD operations)
│   └── product_img/        # Uploaded product images
├── process/                # Frontend backend logic (Cart, Auth, Checkout via AJAX)
├── vendor/                 # Composer dependencies (PHPMailer, Stripe API)
├── index.php               # Storefront Homepage
├── shop.php                # Main product listing page
├── Check-out.php           # Stripe Checkout initialization
└── webhook.php             # Stripe payment confirmation listener
```
<img width="1919" height="909" alt="1" src="https://github.com/user-attachments/assets/69d0d3be-480d-4466-a224-4003d3440d3c" />
<img width="1919" height="910" alt="Screenshot 2026-05-05 164737" src="https://github.com/user-attachments/assets/c419a993-6995-4025-8dc9-b1ad6ebc314c" />
<img width="1919" height="908" alt="Screenshot 2026-05-05 164753" src="https://github.com/user-attachments/assets/997e6199-8252-4f73-b0d8-72771c002875" />
<img width="1919" height="909" alt="Screenshot 2026-05-05 164723" src="https://github.com/user-attachments/assets/a61cbf72-3e0d-4267-918a-11f13eb0fa6a" />


