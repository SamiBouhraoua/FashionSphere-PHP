#  FashionSphere

FashionSphere is a web-based e-commerce application developed in **PHP** and **MySQL**, designed to manage a fashion store online. The project features a public interface for customers and a secure admin dashboard to manage products and users. It was built as part of a web development academic project.

---

##  Project Overview

This platform allows users to browse fashion items (accessories, clothing, etc.), view product details, create an account, and add items to their shopping cart. Admins have full control over the product catalog and user management through a dedicated back-office interface.

---

##  Features

###  User (Customer)
- User registration and login
- Browse available products
- View detailed product information
- Add products to cart
- Remove products from cart
- Access personal user space

###  Admin
- Secure login system
- Add, edit, and delete products
- Manage users (add, update, delete)
- View product details
- Full admin dashboard for product/user control

---

##  Project Structure

```
fashionsphere1-php/
├── fashionsphere.sql                  # SQL script to create and populate the database
└── projetfinale/
    ├── home.php                       # Home page
    ├── login.php                      # Login page
    ├── accessories.php                # Accessories page
    ├── cart.php                       # Shopping cart
    ├── details.php                    # Product details
    ├── admin_space.php                # Admin dashboard
    ├── add.php / edit.php / delete.php               # Product management
    ├── add_user.php / edit_user.php / delete_user.php # User management
    ├── *.css                          # CSS styling files
```

---

##  Technologies Used

- **Languages:** PHP, HTML5, CSS3
- **Database:** MySQL
- **Local Server:** XAMPP (or any LAMP/WAMP environment)
- **DB Interface:** phpMyAdmin

---

##  Installation Guide

1. **Clone the repository:**
```bash
git clone https://github.com/your-username/fashionsphere.git
```

2. **Set up the local server:**
   - Install XAMPP, MAMP, or WAMP
   - Copy the folder `fashionsphere1-php` into your `htdocs` directory (for XAMPP)

3. **Create the database:**
   - Open phpMyAdmin via `http://localhost/phpmyadmin`
   - Create a new database named `fashionsphere`
   - Import the file `fashionsphere.sql` located in the root folder

4. **Launch the application:**
   - Start Apache and MySQL from XAMPP
   - Visit: `http://localhost/fashionsphere-php/fashionsphere/home.php`

---

##  Default Admin Login

- **Username:** admin  
- **Password:** admin  
*(You can change these in the database after import.)*

---

##  Author

- **Name:** Bouhraoua sami 
- **Email:** samibouhraoua5@gmail.com  
- **Status:** Web Development Student  
- **Year:** 2025  

---

##  License

This project is released under the **MIT License**.  
You are free to use, modify, and distribute it for personal or educational purposes.

