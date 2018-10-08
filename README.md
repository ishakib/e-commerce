
A PHP e-commerce web application.

To set this web application, make sure PHP and PHPMyAdmin is installed on your server.
Next open PHPMyAdmin, create a database and import the bolt.sql file. This will generate tables in your database on your server.
Upload all files on your server except for backup-db which is the the database which needs to be imported on your phpmyadmin
The admin user which I have made has an User Name = 'admin' and the Password = '123'. (Please confirm this in db or create one manually.

Open config.php file and add the details of your PHPMyAdmin's id and password to access the database. Now re-upload this file to the server.
Once this is done, go to the url of your website and it should be up and running.
Enjoy!



# e-commerce
Basic ecomerce site buid with raw php, CSS , mysql , javascript

back end- admin


Incase you are new and to see the site Loocally

By Using Xampp

In ubutu:
-install xampp in your ubutu machine
-run the xampp $sudo /opt/lampp/lampp start
-clone the file in /opt/lampp/htdocs/

To see the back end (Admin Panel )
http://localhost/e-commerce/admin/login.php 
user: admin
pass: 123

To see the front end
http://localhost:/shop/
it will load the index.php file


