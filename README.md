Simple Blog System (PHP + jQuery + Bootstrap)

A lightweight blog system built with PHP, PDO, jQuery, and Bootstrap.

Features:
API with CRUD operations (GET, POST, DELETE). 
Single-page dashboard with AJAX (list, create, delete posts). 
Search + sort (client-side). 
Validation (title required, body ≥ 100 chars). 
Mobile-friendly layout. 
Character counter for post body. 

Set-up Instructions
1. Clone 
    git clone https://github.com/junharvz/blog-system.git
    cd blog-system
2. Create a new MySQL/MariaDB database and run:
    CREATE DATABASE blogdb;
    USE blog-database;
    
    CREATE TABLE posts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        body TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
3. Edit config.php and update your credentials:
    "host" => "localhost",
    "db" => "blog_database",
    "user" => "root",
    "password" => ""
4. Place the project in your web server’s root folder (e.g. htdocs for XAMPP or www for WAMP).
   Then open in browser: http://localhost/blog-system/index.php
   
5. Done! The blog system is ready.



   
