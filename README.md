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
1. Install WampServer
    Link: https://sourceforge.net/projects/wampserver/
    Install all required C++ Redist in order to complete the installation
2. Make sure you already have Git in your system. 
    If not, you can download it here: https://git-scm.com/downloads
3. After installing WampServer, locate "wamp64/www"
4. Clone the GitHub repo from www.github.com/junharvz/blog-system
    Open Git Bash
    Run: git clone https://github.com/JunHarvz/blog-system
    After the process, locate the "blog-system" folder and paste in inside "www" folder
5. Run WampServer
6. In your browser, go to http://localhost/phpmyadmin
7. You will be sent to PhpMyAdmin Database. set username to "root" and empty password.
    Click Login.
8. Create New Database and name it "blog_database"
9. Navigate to the Import tab
10. Choose the file "blog_database.sql" inside "blog-system" folder
11. Scroll down and click the "Import" or "Go" button to begin the import process.
     After importing, you can see the "post" table.
12. Open another tab and run http://localhost/blog-system
13. Test the system.

   



   
